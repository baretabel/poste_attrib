<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

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
if(Auth::guest()){
Route::get('/', function () {
     return view('auth.login');
});
}elseif(Auth::user()){
    Route::get('/', [MainController::class, 'vue']);
}

Route::post('/post/add', [MainController::class, 'add_poste']);
Route::post('/client/add', [MainController::class, 'add_client']);

Route::post('/attrib/add', [MainController::class, 'add_attrib']);
Route::get('/table/{id}', [MainController::class, 'table'])->name('table');
Route::get('/next/{id}', [MainController::class, 'next']);

Route::get('/data/{term?}', [MainController::class, 'data'])->name('data');
Route::get('/previous/{id}', [MainController::class, 'previous']);
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard',[MainController::class, 'vue'])->name('dashboard');
