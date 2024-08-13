<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MyController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/laravelhome', function () {
    return view('welcome');
});

Route::get('/', [MyController::class, 'index']);

Route::get('/insert', function(){
    return view('insert');
});

Route::post('/insert', [MyController::class, 'insert']);

Route::post('/remove', [MyController::class, 'remove']);
