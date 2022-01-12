<?php

use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\ImagensController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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
    return view('home', ['pagina' => 'home']);
})->name('home');

Route::get('produtos', [ProdutosController::class, 'index'])->middleware('verified')->name('produtos');

Route::get('/produtos/inserir', [ProdutosController::class, 'create'])->name('produtos.inserir');

Route::post('/produtos/inserir', [ProdutosController::class, 'insert'])->name('produtos.gravar');

Route::get('/produtos/{prod}', [ProdutosController::class, 'show'])->name('produtos.show');

Route::get('/produtos/{prod}/editar', [ProdutosController::class, 'edit'])->name('produtos.edit');

Route::put('/produtos/{prod}/editar', [ProdutosController::class, 'update'])->name('produtos.update');

Route::get('/produtos/{prod}/apagar', [ProdutosController::class, 'remove'])->name('produtos.remove');

Route::delete('/produtos/{prod}/apagar', [ProdutosController::class, 'delete'])->name('produtos.delete');

Route::get('/produtos/{prod}/recortar', [ProdutosController::class, 'recorte'])->name('produtos.recorte');

Route::post('/produtos/{prod}/recortar', [ProdutosController::class, 'recorte'])->name('produtos.cut');

Route::get('usuarios', [UsuariosController::class, 'index'])->name('usuarios.index');

Route::prefix('usuarios')->group(function() {
    
    Route::get('/inserir', [UsuariosController::class, 'create'])->name('usuarios.inserir');
    Route::post('/inserir', [UsuariosController::class, 'insert'])->name('usuarios.gravar');

});

Route::get('/login', [UsuariosController::class, 'login'])->name('login');
Route::post('/login', [UsuariosController::class, 'login']);

Route::get('/logout', [UsuariosController::class, 'logout'])->name('logout');

Route::get('/email/verify', function () {
    return view('auth.verify-email', ['pagina' => 'verify-email']);
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect()->route('home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/profile', [UsuariosController::class, 'profile'])->name('profile');

Route::get('/profile/edit', [UsuariosController::class, 'edit'])->middleware('auth')->name('profile.edit');
Route::put('/profile/edit', [UsuariosController::class, 'update'])->name('profile.update');

Route::get('/profile/password', [UsuariosController::class, 'alterar_senha'])->middleware('auth')->name('profile.senha');
Route::put ('/profile/password', [UsuariosController::class, 'update_senha'])->middleware('auth')->name('profile.update_senha');

// Rota para acessar a galeria
Route::get('galeria', [ImagensController::class, 'index'])->name('galeria');

// Rota para acessar a página de inserção de imagem
Route::get('/galeria/inserir', [ImagensController::class, 'create'])->name('galeria.inserir');

// Rota que insere a imagem e seus dados no banco
Route::post('/galeria/inserir', [ImagensController::class, 'insert'])->name('galeria.gravar');

// Rota para acessar página de visualização da imagem especificada em "img"
Route::get('/galeria/{img}', [ImagensController::class, 'show'])->name('galeria.show');