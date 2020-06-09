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

Route::middleware(['auth', 'SenhaRedefinida'])->group(function () {
    Route::get('/usuarios', 'UsuariosController@index')->name('usuarios');
    Route::get('/usuarios/cadastro', 'UsuariosController@telaCadastroUsuario')->name('telaCadastroUsuario');
    Route::get('/usuarios/cadastro/{id}', 'UsuariosController@getUsuario')->name('usuarioId');
    Route::post('/usuarios/delete/{id}', 'UsuariosController@deletarUsuario')->name('deletarUsuario');
    Route::post('/usuarios/cadastro/novo', 'UsuariosController@cadastrarUsuario')->name('cadastrarUsuario');
    Route::post('/usuarios/cadastro/alterar/{id}', 'UsuariosController@alterarUsuario')->name('alterarUsuario');
    Route::any('/usuarios/busca', 'UsuariosController@buscaUsuario')->name('usuariosBusca');

    Route::get('/proprietarios', 'ProprietariosController@index')->name('proprietarios');
    Route::get('/proprietarios/cadastro', 'ProprietariosController@telaCadastroProprietario')->name('telaCadastroProprietario');
    Route::get('/proprietarios/cadastro/{id}', 'ProprietariosController@getProprietario')->name('proprietarioId');
    Route::post('/proprietarios/delete/{id}', 'ProprietariosController@deletarProprietario')->name('deletarProprietario');
    Route::post('/proprietarios/cadastro/novo', 'ProprietariosController@cadastrarProprietario')->name('cadastrarProprietario');
    Route::post('/proprietarios/cadastro/alterar/{id}', 'ProprietariosController@alterarProprietario')->name('alterarProprietario');
    Route::any('/proprietarios/busca', 'ProprietariosController@buscaProprietario')->name('proprietariosBusca');

    Route::get('/residencias', 'ResidenciasController@index')->name('residencias');
    Route::get('/residencias/cadastro', 'ResidenciasController@telaCadastroResidencia')->name('telaCadastroResidencia');
    Route::get('/residencias/cadastro/{id}', 'ResidenciasController@getResidencia')->name('residenciaId');
    Route::post('/residencias/delete/{id}', 'ResidenciasController@deletarResidencia')->name('deletarResidencia');
    Route::post('/residencias/cadastro/novo', 'ResidenciasController@cadastrarResidencia')->name('cadastrarResidencia');
    Route::post('/residencias/cadastro/alterar/{id}', 'ResidenciasController@alterarResidencia')->name('alterarResidencia');
    Route::any('/residencias/busca', 'ResidenciaController@buscaResidencia')->name('residenciasBusca');


});

Route::middleware(['auth'])->group(function () {
    Route::get('/usuarios/redefinir', 'UsuariosController@telaRedefinirSenha')->name('telaRedefinirSenha');
    Route::post('/usuarios/redefinir/altera/{id}', 'UsuariosController@redefinirSenha')->name('redefinirSenha');
});

Auth::routes();
