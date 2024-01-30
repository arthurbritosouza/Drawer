<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DrawerController;
use App\Http\Controllers\AnotacaoController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect('/arquivos');
});

Route::middleware(['auth'])->group(function () {
        //routes arquivos
        Route::get('tela_inicial', [DrawerController::class, 'tela_inicial']);
        Route::get('arquivos', [DrawerController::class, 'arquivos'])->name('admin.arquivos');
        Route::get('cadastrar_arquivo_form', [DrawerController::class, 'cadastrar_arquivo_form'])->name('cadastrar.arquivo.form');
        Route::post('cadastrar_arquivo', [DrawerController::class, 'cadastrar_arquivo'])->name('cadastrar.arquivo');
        Route::get('apagar_arquivo/{id}', [DrawerController::class, 'apagar_arquivo'])->name('apagar.arquivo');
        Route::get('editar_arquivo_form/{id}', [DrawerController::class, 'editar_arquivo_form'])->name('editar.arquivo.form');
        Route::post('editar_arquivo/{id}', [DrawerController::class, 'editar_arquivo'])->name('editar.arquivo');
        Route::get('visualizar_arquivo/{id}', [DrawerController::class, 'visualizar_arquivo'])->name('visualizar.arquivo');
        //fim routes arquivos

        //routes anotação
        Route::post('cadastrar_anotacao', [AnotacaoController::class, 'cadastrar_anotacao'])->name('cadastrar.anotacao');
        Route::get('anotacao/{id}', [AnotacaoController::class, 'anotacao'])->name('anotacao');
        Route::get('apagar_anotacao/{id}', [AnotacaoController::class, 'apagar_anotacao'])->name('apagar.anotacao');


        //fim routes anotação

    
});


Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', [SessionsController::class, 'destroy']);
	Route::get('/user-profile', [InfoUserController::class, 'create']);
	Route::post('/user-profile', [InfoUserController::class, 'store']);
    Route::get('/login', function () {
		return view('/dashboard');
	})->name('sign-up');
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