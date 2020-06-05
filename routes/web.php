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


Route::get('/', 'HomeController@index')->name('/');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/usuarios', 'UsuariosController@index')->name('usuarios');
// Route::get('/usuarios/cadastro', 'UsuariosController@telaCadastroUsuario')->name('telaCadastroUsuario');
// Route::get('/usuarios/cadastro/{id}', 'UsuariosController@getUsuario')->name('usuarioId');
// Route::post('/usuarios/delete/{id}', 'UsuariosController@deletarUsuario')->name('deletarUsuario');
// Route::post('/usuarios/cadastro/novo', 'UsuariosController@cadastrarUsuario')->name('cadastrarUsuario');
// Route::post('/usuarios/cadastro/alterar/{id}', 'UsuariosController@alterarUsuario')->name('alterarUsuario');
// Route::any('/usuarios/busca', 'UsuariosController@buscaUsuario')->name('usuariosBusca');
// Route::get('/usuarios/redefinir', 'UsuariosController@telaRedefinirSenha')->name('telaRedefinirSenha');
// Route::post('/usuarios/redefinir/altera/{id}', 'UsuariosController@redefinirSenha')->name('redefinirSenha');


Auth::routes();