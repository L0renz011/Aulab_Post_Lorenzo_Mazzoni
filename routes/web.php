<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RegisterController;
use App\Models\User;

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

Route::get('/', [PublicController::class, 'homepage'])->name('homepage');

Route::get('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create');

Route::post('/article/store', [ArticleController::class, 'store'])->name('article.store');

Route::get('/article/index', [ArticleController::class, 'index'])->name('article.index');

Route::get('/article/show/{article}', [ArticleController::class, 'show'])->name('article.show');

Route::get('/article/category/{category}', [ArticleController::class, 'byCategory'])->name('article.byCategory');

Route::get('/article/editor/{editor}', [ArticleController::class, 'byEditor'])->name('article.byEditor');

Route::get('/article/user/{user}', [ArticleController::class, 'byUser'])->name('article.byUser');

Route::get('/careers', [PublicController::class, 'careers'])->name('careers');

Route::post('/careers/submit', [PublicController::class, 'careerSubmit'])->name('careers.submit');

Route::middleware('admin')->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/{user}/set-admin', [AdminController::class, 'setAdmin'])->name('admin.setAdmin');
    Route::get('/admin/{user}/set-revisor', [AdminController::class, 'setRevisor'])->name('admin.setRevisor');
    Route::get('/admin/{user}/set-writer', [AdminController::class, 'setWriter'])->name('admin.setWriter');
});

