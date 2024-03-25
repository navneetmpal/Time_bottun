<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TimeController;
use App\Http\Controllers\DropZoneController;

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

// route::get('/',[TimeController::class, 'index']);

// Route::post('/', [TimeController::class, 'index']);
Route::get('/apply', [TimeController::class, 'getTime']);//store
Route::post('/store', [TimeController::class, 'store'])->name('store');
Route::get('/show/{id}', [TimeController::class, 'show'])->name('show');

//dropzone
Route::resource('/dropzone',DropZoneController::class);
// Route::get('address-data', [AdminController::class, 'data'])->name('address.data');
Route::get('/dropzonedestroy/{id}', [DropZoneController::class, 'destroy'])->name('dropzone.destroy');
// Route::post('/addressupdate/{id}', [AdminController::class, 'update'])->name('addressupdate');


//phpvariable
Route::get('/phpvariable', [TimeController::class, 'phpvariable'])->middleware('auth');
Route::get('/login', [TimeController::class, 'login'])->name('login');