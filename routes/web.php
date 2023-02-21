<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\HomeController ;
use App\Http\Controllers\InvoiceController ;
use App\Http\Controllers\certificateontroller ;
use App\Http\Controllers\rintController ;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use  Illuminate\Support\Facades\Artisan;



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
    Route::get('/', [HomeController::class, 'index'])->name('home');
    
    Route::group(['prefix' => 'invoice'], function() {
        Route::get('/create', [InvoiceController::class, 'show'])->name('invoice.create');
        Route::post('/store', [InvoiceController::class, 'store'])->name('invoice.store');
        Route::get('/edit/{id}', [InvoiceController::class, 'edit'])->name('invoice.edit');
        Route::put('/update/{invoice_client}', [InvoiceController::class, 'update'])->name('invoice.update');
        Route::DELETE('/delete', [InvoiceController::class, 'delete'])->name('invoice.delete');
        Route::get('/index', [InvoiceController::class, 'index'])->name('invoice.index');
        Route::get('/invoiceView/{id}', [InvoiceController::class, 'invoiceView'])->name('invoice.invoiceView');
        Route::get('/invoicePrint/{id}', [InvoiceController::class, 'invoicePrint'])->name('invoice.invoicePrint');


        // Route::get('/viewInvoice/{id}', [InvoiceController::class, 'viewInvoice'])->name('invoice.viewInvoice');
        // Route::get('/printIn', [InvoiceController::class, 'printIn'])->name('invoice.printIn');
        // Route::get('/prnpriview/{id}',[PrintController::class, 'prnpriview'])->name('print');
    });

        Route::resource('certificate' , certificateontroller::class);
        Route::get('/certificateView/{id}', [certificateontroller::class, 'certificateView'])->name('certificate.certificateView');
        Route::get('/certificatePrint/{id}', [certificateontroller::class, 'certificatePrint'])->name('certificate.certificatePrint');
      
      
        Route::post('/updateTax', [certificateontroller::class, 'updateTax'])->name('updateTax');


    
});
// Route::resource('rint', rintController::class);


Route::get('/lang', function (){
    dd(app()->getLocale());
    return back();
})->middleware('lang')->name('language.change');

Route::get('/clear', function (){
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    return back();
});


// // Route::get('/students',[PrintController::class, 'index']);
// Route::get('/test', function(){
//     $role = Role::where('name' , 'Super-Admin')->first();
//     $permis = Permission::all();
//     // $permis->toarray();
//     // $role->givePermissionTo([$permis]);
//     foreach($permis as $permis1){
//         $role->givePermissionTo($permis1->name);
//     }
//     return view('test');
// });
// Route::get('/invoice2', function(){
//     return view('printIn');
// });
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);






