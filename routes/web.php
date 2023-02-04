<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postController;

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

Route::group(['middleware' => ['auth']], function () {
    Route::get('/posts', [postController::class,'index'])->name("index");
    Route::get('/posts/create', [postController::class, 'create'])->name("post.create");
    Route::post('/posts/store', [postController::class, 'store'])->name("post.store");
    Route::post('/posts/update/{id}', [postController::class, 'update'])->name("post.update");
    Route::get('/posts/show/{id}', [postController::class, 'show'])->name("post.show");
    Route::get('/posts/edit/{id}', [postController::class, 'edit'])->name("post.edit");
    Route::get('/posts/delete/{id}', [postController::class, 'destroy'])->name("post.destroy");
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
