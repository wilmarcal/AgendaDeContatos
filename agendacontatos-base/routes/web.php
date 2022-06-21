<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Usuario;

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


Route::get('/', [Usuario::class, 'home']);
Route::get('/cadastro', [Usuario::class, 'cadastro']);
Route::get('/registrar', [Usuario::class , 'registrar']);
Route::get('/contatos/remover/{id}', [Usuario::class , 'excluir']);
Route::get('/contatos/detalhes/{id}', [Usuario::class , 'detalhes']);
Route::get('/contatos/teledit/{id}', [Usuario::class , 'renderTel']);
Route::get('/contatos/endedit/{id}', [Usuario::class , 'renderEnd']);
Route::get('/contatos/addTel/{id}', [Usuario::class , 'addTel']);
Route::get('/contatos/addEnd/{id}', [Usuario::class , 'addEnd']);
Route::get('/mail', function(){

    return new \App\Mail\agendacontatos();
});
