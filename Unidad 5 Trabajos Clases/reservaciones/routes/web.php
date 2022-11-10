<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ReservationController;

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

//Rutas Maquetacion del proyecto
Route::get('/', function () {
    return view('welcome');
});

Route::get('home', function () {
    return view('home');
});
//Rutas Maquetacion del proyecto

/*Route::get('saludo/{name}', function ($name) {
    echo "Hola ".$name;
});*/

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('clients/create',[ClientController::class,'create']);

Route::post('clients',[ClientController::class,'store']);

Route::get('clients/',[ClientController::class,'index']);

Route::get('clients/edit/{id}',[ClientController::class,'edit']);

Route::put('clients',[ClientController::class,'update']);

Route::get('users/',[UserController::class,'index']);

Route::get('users/create',[UserController::class,'create']);

Route::get('users/{id}',[UserController::class,'show']);

Route::post('users/',[UserController::class,'store']);


Route::get('clients/{id}',[ClientController::class,'show']);


Route::get('reservations/',[ReservationController::class,'index']);

Route::get('reservations/{id}',[ReservationController::class,'show']);



/*Route::get('sum/{num}/{num2}', function ($num,$num2) {
    echo $num + $num2;
})->where('num','[0-9]+');*/

/*Route::get('sum/{num}/{num2}', function ($num,$num2) {
    echo $num + $num2;
})->where(['num','[0-9]+'],['num2','[0-9]+']);*/

/*Route::get('sum/{num}/{num2}/{num3}', function ($num,$num2,$num3=0) {
    echo $num + $num2 + $num3;
})->where(['num' => '[0-9]+','num2' => '[0-9]+']);*/

/*Route::post('sum/', function (Request $request) {
    echo $num + $num2 + $num3;
})->where(['num' => '[0-9]+','num2' => '[0-9]+']);*/