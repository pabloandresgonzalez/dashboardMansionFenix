<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewsCreatedMessage;
use App\Services\UserService;
use App\Services\BlockchainService;
use App\Services\CommissionService;
use App\Services\ProductionService;
use Illuminate\Support\Facades\Log;


class NewsController extends Controller
{
    // Inyectar el servicio a través del constructor
    public function __construct(
        UserService $userService,
        BlockchainService $blockchainService,
        CommissionService $commissionService,
        ProductionService $productionService
    )

    {
        $this->userService = $userService;

        $this->blockchainService = $blockchainService;

        $this->commissionService = $commissionService;

        $this->productionService = $productionService;

        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $currency = 'USD';

        /*
        $news = News::orderBy('updated_at', 'Desc')->paginate(3);
        $data = ['news' => $news];
        */

        $news = News::where('isActive', true) // Filtra solo las noticias activas
            ->orderBy('updated_at', 'desc') // Ordena por fecha de actualización descendente
            ->paginate(3); // Paginación de 3 elementos por página

        $data = ['news' => $news];

        // Obtener el total de usuarios y la lista
        $data = $this->userService->getAllEnrolledUsers();
        $total = $data['total'];

        // Obtenemos el precio de la criptomoneda en la moneda solicitada
        $price = $this->blockchainService->getCryptoPrice($currency);

        $totalCommission = $this->commissionService->getTotalCommission();

        $totalProduction = $this->productionService->getMonthlyUtility();

        // Retornar la vista con un array asociativo
        return view('News.index', [
            'news' => $news,
            'total' => $total,
            'price' => $price,
            'currency' => $currency,
            'totalCommission' => $totalCommission,
            'totalProduction' => $totalProduction
        ]);
    }

    public function indexAdmin()
    {
        $currency = 'USD';
        $news = News::orderBy('updated_at', 'Desc')->paginate(3);
        $data = ['news' => $news];

        // Obtener el total de usuarios y la lista
        $data = $this->userService->getAllEnrolledUsers();
        $total = $data['total'];

        // Obtenemos el precio de la criptomoneda en la moneda solicitada
        $price = $this->blockchainService->getCryptoPrice($currency);

        $totalCommission = $this->commissionService->getTotalCommission();

        $totalProduction = $this->productionService->getMonthlyUtility();

        // Retornar la vista con un array asociativo
        return view('News.indexAdmin', [
            'news' => $news,
            'total' => $total,
            'price' => $price,
            'currency' => $currency,
            'totalCommission' => $totalCommission,
            'totalProduction' => $totalProduction
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function store(StoreNewsRequest $request)
    {
        // Crear el objeto News usando la validación previa del FormRequest
        $news = new News();
        $news->title = $request->input('title');
        $news->intro = $request->input('intro');
        $news->detail = $request->input('detail');
        $news->isActive = $request->input('isActive');

        // Verificar si viene el URL del video, si no, asignamos null
        $news->url_video = $request->input('url_video', null);

        //Subir la imagen photo
        $image_photo = $request->file('image');
        if ($image_photo) {

          //Poner nombre unico
          $image_photo_name = time() . $image_photo->getClientOriginalName();

          //Guardarla en la carpeta storage (storage/app/photoNews)
          Storage::disk('photousers')->put($image_photo_name, File::get($image_photo));

          //Seteo el nombre de la imagen en el objeto
          $news->image = $image_photo_name;
        }

        // Guardar la noticia en la base de datos
        $news->save();

        // Obtener los correos electrónicos de los usuarios activos
        $users = DB::table('users')->where('isActive', true)->pluck('email');

        Mail::to($users)->send(new NewsCreatedMessage($news));

        return redirect()->route('index.news')->with('success', 'Noticia creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNewsRequest $request, $id)
    {
        // Obtener la noticia existente
        $news = News::findOrFail($id);

        // Actualizar los campos de texto
        $news->title = $request->input('title');
        $news->intro = $request->input('intro');
        $news->detail = $request->input('detail');
        $news->isActive = $request->input('isActive');
        $news->url_video = $request->input('url_video', null);

        // Subir y guardar la imagen si está presente en la solicitud
        $image_photo = $request->file('image');
        if ($image_photo) {
            // Generar un nombre único para la imagen
            $image_photo_name = time() . '_' . $image_photo->getClientOriginalName();

            // Guardar la imagen en la carpeta "public/photousers"
            $image_photo->storeAs('public/photousers', $image_photo_name);

            // Actualizar el campo `image` en la base de datos
            $news->image = $image_photo_name;
        } else {
            // Si no se sube imagen, asignar null
            $news->image = null;
        }

        // Guardar los cambios en la base de datos
        $news->save();

        // Verifica si isActive es verdadero
        $isActive = $request->input('isActive');
        if ($isActive) {
            // Obtener los correos electrónicos de los usuarios activos
            $users = DB::table('users')->where('isActive', true)->pluck('email');

            // Enviar email solo si isActive es true
            Mail::to($users)->send(new NewsCreatedMessage($news));
        } else {
            // Registrar un mensaje en el log si isActive es falso
            Log::info('No se envió el correo porque isActive es falso.');
        }

        // Redirigir con el mensaje de éxito y la información sobre el contenido actualizado
        return redirect()->route('index.news')
            ->with('success', 'Noticia actualizada correctamente.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        //
    }
}
