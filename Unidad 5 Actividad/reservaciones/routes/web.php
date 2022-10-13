<?php

use Illuminate\Support\Facades\Route;
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
    return view('welcome');
});

Route::get('saludo/{name}', function ($name) {
    echo "Hola ".$name;
});


/*Route::get('sum/{num}/{num2}', function ($num,$num2) {
    echo $num + $num2;
})->where('num','[0-9]+');*/

/*Route::get('sum/{num}/{num2}', function ($num,$num2) {
    echo $num + $num2;
})->where(['num','[0-9]+'],['num2','[0-9]+']);*/

Route::get('sum/{num}/{num2}/{num3}', function ($num,$num2,$num3=0) {
    echo $num + $num2 + $num3;
})->where(['num' => '[0-9]+','num2' => '[0-9]+']);

/*Route::post('sum/', function (Request $request) {
    echo $num + $num2 + $num3;
})->where(['num' => '[0-9]+','num2' => '[0-9]+']);*/