<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
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
    return view('home');
});
Route::get('/admin', function () {
    return view('admin/telas/entregas');
})->middleware('isLogged')->name('admin');
Route::get('/admin/entrega/{id?}', function($id = ""){
    return view('admin/telas/entrega', ['idEntrega'=>$id]);
})->middleware('isLogged')->name('entrega');
// Route::get('/logar', function (){
//     return view('admin/includes/login');
// })->name('logar');

Route::controller(UserController::class)->group(function(){
    Route::post('/logar', 'store');
    Route::get('/logar', 'index');
    Route::get('/sair','logout')->name('sair');
});