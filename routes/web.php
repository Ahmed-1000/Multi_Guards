<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\newblog;
use App\Http\Controllers\Admin\Admincontroller;


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

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('user.')->name('user.')->group(function(){
    
   Route::middleware(['guest:web','preventbackhistory'])->group(function(){
       
       Route::view('/login','dashboard.user.login')->name('login');
       Route::view('/register','dashboard.user.register')->name('register');
       Route::post('/create',[newblog::class,'create'])->name('create');
       Route::post('/check',[newblog::class,'check'])->name('check');
   }); 
    
    Route::middleware(['auth:web','preventbackhistory'])->group(function(){
        
        Route::view('/Home','dashboard.user.Home')->name('Home');
        Route::post('/logout',[newblog::class,'logout'])->name('logout');
    });
});

Route::prefix('admin')->name('admin.')->group(function(){
      Route::middleware(['guest:admin','preventbackhistory'])->group(function(){
          Route::view('/login','dashboard.admin.login')->name('login');
          Route::post('/check',[Admincontroller::class,'check'])->name('check');
          
      });     
      Route::middleware(['auth:admin','preventbackhistory'])->group(function(){
          Route::view('/Home','dashboard.admin.Home')->name('Home');
          Route::post('/logout',[Admincontroller::class,'logout'])->name('logout');
          Route::get('/search',[Admincontroller::class,'search'])->name('search');
          Route::get('edit/{id}',[Admincontroller::class,'edit'])->name('edit');
          Route::get('delete/{id}',[Admincontroller::class,'delete'])->name('delete');
          Route::put('update/{id}',[Admincontroller::class,'update'])->name('update');
      });     
    
    
    
});