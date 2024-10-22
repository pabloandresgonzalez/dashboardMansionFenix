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
use App\Services\UserService;
use App\Mail\NewsCreatedMessage;


class NewsController extends Controller
{
    // Inyectar el servicio a través del constructor
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $news = News::orderBy('updated_at', 'Desc')->paginate(3);
        $data = ['news' => $news];

        // Obtener el total de usuarios y la lista
        $data = $this->userService->getAllEnrolledUsers();
        //$users = $data['users'];
        $total = $data['total'];

        // Retornar la vista con un array asociativo
        return view('News.index', [
            'news' => $news,
            'total' => $total
        ]);
    }

    public function indexAdmin()
    {

        $news = News::orderBy('updated_at', 'Desc')->paginate(3);
        $data = ['news' => $news];

        // Obtener el total de usuarios y la lista
        $data = $this->userService->getAllEnrolledUsers();
        //$users = $data['users'];
        $total = $data['total'];

        // Retornar la vista con un array asociativo
        return view('News.indexAdmin', [
            'news' => $news,
            'total' => $total
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
        $news->image = $request->input('image');
        $news->isActive = $request->input('isActive');
        $news->url_video = $request->input('url_video');

        // Subir la imagen solo si está presente
        if ($request->hasFile('image')) {
            // Poner nombre único a la imagen y guardarla en la carpeta de 'news_images'
            $imagePath = $request->file('image')->store('news_images', 'public');
            // Guardar el nombre del archivo en el objeto News
            $news->image = $imagePath;
        }

        // Guardar la noticia en la base de datos
        $news->save();

        //Enviar email
        $users = DB::table('users')->pluck('email');

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
        // Actualizar los campos del objeto News usando la validación previa del FormRequest
        $news = News::findOrFail($id);
        $news->title = $request->input('title');
        $news->intro = $request->input('intro');
        $news->detail = $request->input('detail');
        $news->isActive = $request->input('isActive');
        $news->url_video = $request->input('url_video');

        // Subir la nueva imagen solo si está presente
        if ($request->hasFile('image')) {

            // Poner nombre único a la nueva imagen y guardarla en la carpeta de 'news_images'
            $imagePath = $request->file('image')->store('news_images', 'public');
            // Guardar el nuevo nombre del archivo en el objeto News
            $news->image = $imagePath;
        }

        // Guardar los cambios en la base de datos
        $news->save();

        //Enviar email
        $users = DB::table('users')->pluck('email');

        Mail::to($users)->send(new NewsCreatedMessage($news));

        return redirect()->route('index.news')->with('success', 'Noticia actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        //
    }

    /*
    private function countUsers()
    {
      // Conseguir usuario identificado
      $user = \Auth::user();
      $id = $user->id;

      // Total usuarios
      $totalusers = DB::table('users')
            ->where('ownerId', $id)->count();

      return $totalusers;
    }*/



}
