<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\StubController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ImageGalleryController;
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



Route::get('about',[PagesController::class,'getlist']);
Route::get('contact',[PagesController::class,'getContact']);
Route::post('contact',[PagesController::class,'postContact']);

Route::get('blob/{slug}', [PagesController::class, 'getSingle'])->where('slug','[\w\d\-\_]+')->name('blob.single');
   
  Route::get('/blob',[PagesController::class, 'getIndex'])->name('blob.index');

Route::get('/', 'App\Http\Controllers\PagesController@getwel')->name('pages.welcome');

Route::get('welcome', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function(){

  Route::get('/gallery', [ImageGalleryController::class,'index'])->name('image.dashboard');
  Route::post('image-gallery', [ImageGalleryController::class,'upload']);
  Route::delete('image-gallery/{id}', [ImageGalleryController::class,'destroy']);
  

    Route::get('/dashboard',[TasksController::class, 'index'])->name('dashboard');
    Route::get('/blog',[StubController::class, 'index'])->name('blog.dashboard');
    
    
    Route::get('/stub',[StubController::class, 'add']);
    Route::post('/stub',[StubController::class, 'create']);

   
   
   
   
    Route::get('/stub/{stub}', [StubController::class, 'edit']);
    Route::post('/stub/{stub}', [StubController::class, 'update']);

    
    


    Route::get('/task',[TasksController::class, 'add']);
    Route::post('/task',[TasksController::class, 'create']);
    
   
    Route::get('/task/{task}', [TasksController::class, 'edit']);
    Route::post('/task/{task}', [TasksController::class, 'update']);
    
});
