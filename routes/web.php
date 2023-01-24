<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrintController;

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

Route::get('/lang', function (){
    dd(app()->getLocale());
    return back();
})->middleware('lang');

Route::get('/students',[PrintController::class, 'index']);
Route::get('/prnpriview',[PrintController::class, 'prnpriview']);
Route::get('/test', function(){
    return view('test');
});