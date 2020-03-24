<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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




Route::post('/login','UserController@login');
Route::post('/register','UserController@register');

Route::group(['middleware'=>'auth:api'],function(){
    Route::apiResource('/price','PriceController');
    Route::apiResource('/company','CompanyController');
    Route::apiResource('/student','StudentController');
    Route::apiResource('/payment','PaymentController');
});