<?php
date_default_timezone_set('America/Recife');

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;



Route::get('/', function () {
    return view('home');
});
Route::get('/admin', function () {
    return view('admin/telas/entregas');
})->middleware('isLogged')->name('admin');
Route::get('/admin/entrega/{id?}', function($id = ""){
    return view('admin/telas/entrega', ['idEntrega'=>$id]);
})->middleware('isLogged')->name('entrega');
Route::post('/admin/entrega', function(){
    return view('admin/telas/entrega');
})->middleware('isLogged')->name('entrega');


Route::post('/admin/upload', function(){
    $imagem = filter_input(INPUT_POST, 'imagem', FILTER_DEFAULT);
    $AS = filter_input(INPUT_POST, 'AS', FILTER_DEFAULT);
//    var_dump( $imagem);
    list($type,$imagem) = explode(';', $imagem);
    list(,$imagem) = explode(',', $imagem);
    $imagem = base64_decode($imagem);
    $imagem_nome = $AS. '.jpg';
    file_put_contents('c:/xampp/htdocs/sales/public/img/' . $imagem_nome, $imagem);
    return 'ok. imagem '.$imagem_nome.' salva com sucesso!';

})->middleware('isLogged');



//manual
Route::get('/admin/manual', function(){
    return view('admin/manual');
})->middleware('isLogged')->name('manual');

// Route::get('/logar', function (){
//     return view('admin/includes/login');
// })->name('logar');

Route::controller(UserController::class)->group(function(){
    Route::post('/logar', 'store');
    Route::get('/logar', 'index');
    Route::get('/sair','logout')->name('sair');
});