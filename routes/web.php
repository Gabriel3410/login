<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




Route::get('/contato', [ContatoController::class, 'index'])
    ->name('contato.index')->middleware('auth');

Route::get('/contato/create/{id}', [ContatoController::class, 'create'])
    ->name('contato.create')->middleware('auth');

Route::post('/contato/create',[ContatoController::class, 'store'])
    ->name('contato.store')->middleware('auth');

Route::get('/contato/{id}', [ContatoController::class, 'show'])
    ->name('contato.show')->middleware('auth');
//EDIT//
// Exibição do formulário com os dados do recurso //
Route::get('/contato/{id}/edit', [ContatoController::class, 'edit'])
    ->name('contato.edit')->middleware('auth');

Route::put('/contato/{id}', [ContatoController::class, 'update'])
    ->name('contato.update')->middleware('auth');

//DELETE//
Route::delete('/contato/{id}', [ContatoController::class, 'destroy'])
    ->name('contato.destroy')->middleware('auth');


/* ////////////////////////////// User rotas /////////////////////////// */


Route::get('/user', [UserController::class, 'index'])
    ->name('user.index')->middleware('auth');

Route::get('/user/create', [UserController::class, 'create'])
    ->name('user.create')->middleware('auth');

Route::post('/user/create',[UserController::class, 'store'])
    ->name('user.store')->middleware('auth');

Route::get('/user/{id}', [UserController::class, 'show'])
    ->name('user.show')->middleware('auth');
//EDIT//
// Exibição do formulário com os dados do recurso //
Route::get('/user/{id}/edit', [UserController::class, 'edit'])
    ->name('user.edit')->middleware('auth');

Route::put('/user/{id}', [UserController::class, 'update'])
    ->name('user.update')->middleware('auth');

//DELETE//
Route::delete('/user/{id}', [UserController::class, 'destroy'])
    ->name('user.destroy')->middleware('auth');

/* ------------------------------- Rota Upload -------------------------------------------- */

Route::get('/upload/image/{id}', [UploadController::class, 'form_image'])
    ->name('form_image')->middleware('auth');

Route::post('/upload/image/', [UploadController::class, 'upload_image'])
    ->name('upload_image')->middleware('auth');

Route::delete('/upload/image/{id}', [UploadController::class, 'destroy'])
    ->name('upload_destroy')->middleware('auth');


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');


