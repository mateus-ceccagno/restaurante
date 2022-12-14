<?php

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
    return view('welcome');
});

//Route::get('/produto', "App\Http\Controllers\ProdutoController@index")->name("produto.index");
//Route::get('/produto/create', "App\Http\Controllers\ProdutoController@create")->name("produto.create");
//Route::post('/produto', "App\Http\Controllers\ProdutoController@store")->name("produto.store");

//Route::get('/tipoproduto', "App\Http\Controllers\TipoProdutoController@index");

Route::resource('produto', "App\Http\Controllers\ProdutoController");
Route::resource('tipoproduto', "App\Http\Controllers\TipoProdutoController");
Route::resource('endereco', "App\Http\Controllers\EnderecoController");

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/user/logout', 'App\Http\Controllers\Auth\LoginController@userLogout')->name('user.logout');

Route::prefix('admin')->group(function () {
    // Dashboard route
    Route::get('/', 'App\Http\Controllers\AdminController@index')->name('admin.dashboard');

    // Login routes
    Route::get('/login', 'App\Http\Controllers\Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'App\Http\Controllers\Auth\AdminLoginController@login')->name('admin.login.submit');

    // Logout route
    Route::post('/logout', 'App\Http\Controllers\Auth\AdminLoginController@logout')->name('admin.logout');

    // Register routes
    // Route::get('/register', 'App\Http\Controllers\Auth\AdminRegisterController@showRegistrationForm')->name('admin.register');
    // Route::post('/register', 'App\Http\Controllers\Auth\AdminRegisterController@register')->name('admin.register.submit');

    // Password reset routes
    Route::get('/password/reset', 'App\Http\Controllers\Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/email', 'App\Http\Controllers\Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset/{token}', 'App\Http\Controllers\Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::post('/password/reset', 'App\Http\Controllers\Auth\AdminResetPasswordController@reset')->name('admin.password.update');
});

//Rotas para Pedidos de usuário
Route::get('/pedido/usuario', "App\Http\Controllers\PedidoUsuarioController@index")->name('pedidousuario.index');
Route::post('/pedido/usuario', "App\Http\Controllers\PedidoUsuarioController@index");
Route::get('/confirmar-pedido/usuario', "App\Http\Controllers\PedidoUsuarioController@confirmarPedido");
Route::post('/confirmar-pedido/usuario', "App\Http\Controllers\PedidoUsuarioController@confirmarPedido");

Route::get('/pedido/usuario/getprodutos/{id}', "App\Http\Controllers\PedidoUsuarioController@getProdutos");




