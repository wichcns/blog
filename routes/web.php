<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContentController;
use SebastianBergmann\Environment\Runtime;

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

Route::get('/', function(){ return view('welcome');});
Route::get('/login', [AuthController::class,'showLogin'])->name('login');
Route::post('/login',[AuthController::class,'checkLogin']);
Route::get('/logout',[AuthController::class, 'logout'])->name('logout');


Route::middleware(['auth.admin'])->group(function(){

    Route::get('/content/create',[ContentController::class,'create'])->name('create');
    Route::get('/content',[ContentController::class,'index'])->name('home');
    Route::post('/content',[ContentController::class,'store'])->name('store');


    Route::get('/content/{id}/edit',[ContentController::class,'edit'])->name('edit');
    Route::delete('/content/{id}',[ContentController::class,'destroy']);
    Route::put('/content/{id}', [ContentController::class,'update'])->name('update');
});




