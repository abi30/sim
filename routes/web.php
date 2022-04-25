<?php

use App\Http\Controllers\CategoriesController;
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
Route::resource('categories',CategoriesController::class);
// Route::auto('categories',CategoriesController::class);