<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\NameController;

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

Route::group(['middleware'=>['guest']],function(){
    Route::get('/',[AuthController::class,'showLogin'])->name('login.show');
    Route::post('/login',[AuthController::class,'login'])->name('login');
    Route::get('/addUser',[AuthController::class,'addUser'])->name('addUser');
    Route::post('/addUser',[AuthController::class,'DBaddUser'])->name('DBaddUser');
});

Route::group(['middleware'=>['auth']],function(){
    Route::get('/home',function(){
        return view('home');
    })->name('home');

    Route::post('/logout',[AuthController::class,'logout'])->name('logout');

    Route::post('/home',[NameController::class,'outputName'])->name('outputName');
    Route::get('/addName',[NameController::class,'addName'])->name('addName');
    Route::post('/addName',[NameController::class,'DBaddName'])->name('DBaddName');
    Route::get('/hideName',[NameController::class,'hideName'])->name('hideName');

    Route::get('/index',[NameController::class,'index'])->name('index');
    Route::get('/edit',[NameController::class,'edit'])->name('edit');
    Route::post('/edit/{name}',[NameController::class,'update'])->name('update');
    Route::post('/delete/{name}',[NameController::class,'delete'])->name('delete');

});
