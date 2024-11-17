<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\MembresiaController;
use App\Http\Controllers\UserMembershipController;
use App\Http\Controllers\NetworkTransactionController;
use App\Http\Controllers\WalletTransactionsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware' => 'auth'], function () {

	Route::get('/', [HomeController::class, 'dashboard']); // Redirige a dashboard directamente
	Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');



	Route::get('user-management', function () {
		return view('laravel-examples/user-management');
	})->name('user-management');

    Route::get('static-sign-in', function () {
		return view('static-sign-in');
	})->name('sign-in');

    Route::get('static-sign-up', function () {
		return view('static-sign-up');
	})->name('sign-up');

    Route::get('/logout', [SessionsController::class, 'destroy']);
	Route::get('/user-profile', [InfoUserController::class, 'create']);
	Route::post('/user-profile', [InfoUserController::class, 'store']);
    Route::get('/login', function () {
		return view('dashboard');
	})->name('sign-up');

	// Users
	Route::get('/user-management', [UserController::class, 'index'])->name('users-management');
	Route::post('/user-management', [UserController::class, 'store'])->name('users-store');
	Route::put('/user-management/{user}/update', [UserController::class, 'update'])->name('users-update');
	Route::put('/user-management/{user}/updateUser', [UserController::class, 'updateUser'])->name('users-updateUser');
	Route::get('/user-management/avatar/{filename?}', [UserController::class, 'getImage'])->name('user.avatar');
	Route::get('/user-management/{user}/detail', [UserController::class, 'detail']);

	//News
	Route::get('/news', [NewsController::class, 'index'])->name('index.news');
	Route::get('/news/Admin', [NewsController::class, 'indexAdmin'])->name('indexAdmin.news');
	Route::post('/news', [NewsController::class, 'store'])->name('news.store');
	Route::put('/news/{news}/update', [NewsController::class, 'update'])->name('news.update');
	Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');

	//Membresias
	Route::get('/membresias', [MembresiaController::class, 'index'])->name('membresias.index');
	Route::get('/membresias/Admin', [MembresiaController::class, 'indexAdmin'])->name('membresias.indexAdmin');
	Route::post('/membresias', [MembresiaController::class, 'store'])->name('Membresias.store');
	Route::put('/membresias/{membresias}/update', [MembresiaController::class, 'update'])->name('Membresias.update');

	//Memberships
  	Route::get('/membership', [UserMembershipController::class, 'index'])->name('membership.index');
  	Route::post('/membership/store', [UserMembershipController::class, 'store']);
  	Route::put('/membership/{userMembership}/update', [UserMembershipController::class, 'update'])->name('membership.update'); 
  	Route::get('/mismembership', [UserMembershipController::class, 'misMemberships'])->name('mismemberships.index');
  	Route::post('/mismembership/{id}', [UserMembershipController::class, 'renovar'])->name('mismembership.renovar');

  	//NetworkTransaction
  	Route::get('/networktransaction', [NetworkTransactionController::class, 'index'])->name('networktransaction');
  	Route::get('/networktransactionactivacion', [NetworkTransactionController::class, 'indexactivacion'])->name('networktransactionactivacion');	

	//Wallets
	Route::get('/wallet', [WalletTransactionsController::class, 'index'])->name('wallet.index'); 
    Route::get('/walletadmin', [WalletTransactionsController::class, 'indexAdmin'])->name('walletadmin');     
    Route::get('/wallet/{wallet}/edit', [WalletTransactionsController::class, 'edit']);
    Route::put('/wallet/{wallet}', [WalletTransactionsController::class, 'update'])->name('wallet.update');
    Route::get('/wallets/export-excel', [WalletTransactionsController::class, 'exportExcel']);
    Route::get('/walletsaldos', [WalletTransactionsController::class, 'editsaldos'])->name('walletsaldos'); 
    Route::put('/wallets/asaldo', [WalletTransactionsController::class, 'storeAdmin']);
    Route::get('/miwallet', [WalletTransactionsController::class, 'miwallet'])->name('miwallet'); 
    Route::get('/asigsaldo', [WalletTransactionsController::class, 'asigSaldo'])->name('asigsaldo');
    Route::post('wallet/asigsaldo', [WalletTransactionsController::class, 'storeAdmin']);
	Route::post('/wallet/storeuser', [WalletTransactionsController::class, 'storeUser']);
	
	
});


Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/session', [SessionsController::class, 'store']);
	Route::get('/login/forgot-password', [ResetController::class, 'create']);
	Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
	Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
	Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');

});

Route::get('/login', function () {
    return view('session/login-session');
})->name('login');