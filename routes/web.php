<?php
date_default_timezone_set('America/Recife');

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AutorizacaoServico;
use App\Http\Controllers\ColaboradorController;
use Illuminate\Http\Request;


require_once('c:/xampp/htdocs/sales/config.php');


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
    Route::get('/admin/Usuarios','showAll')->middleware('isLogged')->name('allUsers');
    Route::get('/admin/editarUsuario/{id?}','edit')->middleware('isLogged')->name('editUser');
});
//throw new Exception("Error Processing Request", 1);

Route::get('/admin/consulta-entregas', function(){
    return view('admin/telas/entregas');
})->middleware('isLogged')->name('entregas');

Route::controller(AutorizacaoServico::class)->group(function(){
    Route::post('/admin/entrega', 'create')->middleware('isLogged')->name('insertAS');
});



Route::resource('/admin/colaborador', ColaboradorController::class)->names([
    'create'=>'createColaborador'
]);