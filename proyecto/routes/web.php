<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Log;

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
    return redirect('/home');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/pagaments/show/{id}', 'PagamentController@show')->name('show');

Auth::routes();


//--GRUPO DE RUTAS PROTEGIDAS POR EL MIDDLEWARE--

Route::middleware(['auth'])->group(function () {
    
    //---CATEGORIAS---
    Route::get('/usuaris', 'UsuariController@index')->name('index');
    Route::get('/usuaris/add', 'UsuariController@addGet')->name('addGet');
    Route::post('/usuaris/add', 'UsuariController@addPost')->name('addPost');
    Route::get('/usuaris/edit/{id}', 'UsuariController@edit')->name('edit');
    Route::post('/usuaris/update/{id}', 'UsuariController@update')->name('update');
    Route::get('/usuaris/remove/{id}', 'UsuariController@remove')->name('remove');
    
    //---PAGAMENTS---
    Route::get('/pagaments', 'PagamentController@index')->name('index');
    Route::get('/pagaments/add', 'PagamentController@addGet')->name('addGet');
    Route::post('/pagaments/add', 'PagamentController@addPost')->name('addPost');
    Route::get('/pagaments/edit/{id}', 'PagamentController@edit')->name('edit');
    Route::post('/pagaments/update/{id}', 'PagamentController@update')->name('update');
    Route::get('/pagaments/print', 'PagamentController@print')->name('print');
    
    //---COMPTES---
    Route::get('/comptes', 'CompteController@index')->name('index');
    Route::get('/comptes/add', 'CompteController@addGet')->name('addGet');
    Route::post('/comptes/add', 'CompteController@addPost')->name('addPost');
    Route::get('/comptes/edit/{id}', 'CompteController@edit')->name('edit');
    Route::post('/comptes/update/{id}', 'CompteController@update')->name('update');
    Route::get('/comptes/remove/{id}', 'CompteController@remove')->name('remove');
    Route::get('/comptes/print', 'CompteController@print')->name('print');
    
    //---CATEGORIAS---
    Route::get('/categories', 'CategoriaController@index')->name('index');
    Route::get('/categories/add', 'CategoriaController@addGet')->name('addGet');
    Route::post('/categories/add', 'CategoriaController@addPost')->name('addPost');
    Route::get('/categories/edit/{id}', 'CategoriaController@edit')->name('edit');
    //Route::get('/categories/edit/{id}', [\App\Http\Controllers\CategoriaController::class, 'edit']);
    Route::post('/categories/update/{id}', 'CategoriaController@update')->name('update');
    Route::get('/categories/remove/{id}', 'CategoriaController@remove')->name('remove');
    Route::get('/categories/print', 'CategoriaController@print')->name('print');
    
    //---CURSOS---
    Route::get('/cursos', 'CursController@index')->name('index');
    Route::get('/cursos/add', 'CursController@addGet')->name('addGet');
    Route::post('/cursos/add', 'CursController@addPost')->name('addPost');
    Route::get('/cursos/edit/{id}', 'CursController@edit')->name('edit');
    Route::post('/cursos/update/{id}', 'CursController@update')->name('update');
    Route::get('/cursos/remove/{id}', 'CursController@remove')->name('remove');

});
