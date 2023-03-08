<?php
date_default_timezone_set('America/Recife');

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
// use App\Http\Controllers\AutorizacaoServico;
use App\Http\Controllers\Entrega;
use App\Http\Controllers\ASController;
use App\Http\Controllers\ColaboradorController;
use App\Http\Controllers\VeiculoController;
use App\Http\Controllers\NotasAS;
use Illuminate\Http\Request;


require_once('c:/xampp/htdocs/sales/config.php');


Route::get('/', function () {
    return view('home');
});
Route::get('/admin', function () {
    return view('admin/telas/home');
})->middleware('isLogged')->name('admin');


// Route::get('/admin/entrega/{id?}', function($id = ""){
//     return view('admin/telas/entrega', ['idEntrega'=>$id]);
// })->middleware('isLogged')->name('entrega');


// Route::post('/admin/entrega', function(){
//     return view('admin/telas/entrega');
// })->middleware('isLogged')->name('entrega');


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
    Route::post('/logar', 'validalogin');
    Route::get('/logar', 'logar');
    Route::get('/sair','logout')->name('sair');
    // Route::get('/admin/usuarios','showAll')->middleware('isLogged')->name('allUsers');
    Route::get('/admin/usuarios/{id?}/edit','edit')->middleware('isLogged')->name('editaUser');
    Route::post('/admin/usuarios/{id?}/update','update')->middleware('isLogged')->name('updateUser');
    Route::post('/admin/usuarios/store','store')->middleware('isLogged')->name('storeUser');
});


Route::resource('/admin/usuarios', UserController::class)->middleware('isLogged')->names([
    // '/{usuario?}/edit'=>'editaUser',
    'create'=>'createUser',
    'index'=>'allUsers',
    // '/{usuario?}/update'=>'updateUser'
]);
//throw new Exception("Error Processing Request", 1);

/////////////////////////////////////////////////////////////////////////////////////////////

//NOTAS
Route::resource('admin/notas', NotasAS::class)->middleware(['isLogged'])->names([
    'create'=>'createNota',
    'index'=>'notas',
]);
//FIM NOTAS

////////////////////////////////////////////////////////////////////////////////////////

//ENTREGAS
Route::get('/admin/consulta-entregas', function(){
    return view('admin/telas/entregas');
})->middleware('isLogged')->name('entregas');
Route::resource('/admin/entrega', Entrega::class)->middleware('isLogged')->names([
    'create'=>'createEntrega',
    'index'=>'entregas',
    // '{as?}/edit'=>'editarAS'
]);
Route::controller(Entrega::class)->group(function(){
    Route::post('/admin/entrega', 'store')->middleware('isLogged')->name('insertEntrega');
});
//FIM ENTREGAS

///////////////////////////////////////////////////////////////////////////////////////////

// Route::controller(UserController::class)->group(function(){
//     Route::post('/logar', 'validalogin');
//     Route::get('/logar', 'logar');
//     Route::get('/sair','logout')->name('sair');
//     // Route::get('/admin/usuarios','showAll')->middleware('isLogged')->name('allUsers');
//     Route::get('/admin/usuarios/{id?}/edit','edit')->middleware('isLogged')->name('editaUser');
//     Route::post('/admin/usuarios/{id?}/update','update')->middleware('isLogged')->name('updateUser');
//     Route::post('/admin/usuarios/store','store')->middleware('isLogged')->name('storeUser');
// });
Route::resource('/admin/as', ASController::class)->middleware('isLogged')->names([
    'create'=>'createAS',
    'index'=>'allAS',
    // '{as?}/edit'=>'editarAS'
]);
Route::controller(UserController::class)->group(function(){
    Route::get('/admin/as/{id?}/edit','edit')->middleware('isLogged')->name('editarAS');
});
Route::resource('/admin/colaborador', ColaboradorController::class)->middleware('isLogged')->names([
    'create'=>'createColaborador'
]);


Route::resource('/admin/veiculo', VeiculoController::class)->middleware('isLogged')->names([
    'create'=>'createVeiculo'
]);