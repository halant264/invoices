<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrintController;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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

Route::group(['middleware' => ['auth']], function(){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index']
    )->name('home');
});



Route::get('/lang', function (){
    dd(app()->getLocale());
    return back();
})->middleware('lang')->name('language.change');

Route::get('/students',[PrintController::class, 'index']);
Route::get('/prnpriview',[PrintController::class, 'prnpriview']);
Route::get('/test', function(){
    $role = Role::where('name' , 'Super-Admin')->first();
    $permis = Permission::all();
    // $permis->toarray();
    // $role->givePermissionTo([$permis]);
    foreach($permis as $permis1){
        $role->givePermissionTo($permis1->name);
    }
    return view('test');
});
Route::get('/invoice2', function(){
    return view('invoice');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
