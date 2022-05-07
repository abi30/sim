<?php

use App\Http\Controllers\BrandsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\SizesController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;


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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware(['auth:sanctum'])->group(function(){

    //Product categories
    Route::resource('categories',CategoriesController::class);
    Route::get('/api/categories',[CategoriesController::class, 'getCategoriesJson']);
    //Product brands
    Route::resource('brands',BrandsController::class);
    //product sizes
    Route::resource('sizes',SizesController::class);
    // product only
    Route::resource('products',ProductsController::class);
    
});
// category

// Route::get('/template',function(){
//     return view('layouts.master');
// });
// Route::post('categories.store', function () {
//   return view('layouts.master');    
// });
// Route::put('categories.update/{$id}', function () {
//   return view('layouts.master');    
// });
// Route::delete('categories.destroy/{$id}', function () {
//   return view('layouts.master');    
// });
// Route::auto('categories',CategoriesController::class);