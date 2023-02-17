<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/usuarioApi', function (Request $request) {
    $users = new UserController();
    $usuarios = $users->getAll();
   
    // echo '<pre>';print_r(json_encode($usuarios));echo '</pre>';
    return json_encode($usuarios);
});
// Route::middleware('auth:sanctum')->get('/usuarioApi', function (Request $request) {
//     return $request->user();
// });
