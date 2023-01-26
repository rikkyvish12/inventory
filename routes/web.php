<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MaterialController;

use App\Http\Controllers\InOutMaterialController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [InOutMaterialController::class, 'index'] );
Route::post('/', [InOutMaterialController::class, 'store']);

Route::resource('category',CategoryController::class);
Route::resource('material',MaterialController::class);


