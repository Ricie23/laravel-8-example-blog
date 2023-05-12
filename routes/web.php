<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\Services\Newsletter;
use Illuminate\Support\Facades\Route;
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



Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store' ]);
Route::post('newsletter', NewsletterController::class);

Route::middleware('guest')->group(function(){
	Route::get('register', [RegisterController::class, 'create']);
	Route::post('register', [RegisterController::class, 'store']);
	Route::get('login', [SessionsController::class, 'create']);
	Route::post('login', [SessionsController::class, 'store']);
});

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

Route::middleware('can:admin')->group(function(){
	Route::resource('admin/posts', AdminPostController::class)->except('show');
	// Route::get('admin/posts', [AdminPostController::class, 'index'])
	// Route::get('admin/posts/{post}/edit', [AdminPostController::class, 'edit'])
	// Route::patch('admin/posts/{post}', [AdminPostController::class, 'update'])
	// Route::delete('admin/posts/{post}', [AdminPostController::class, 'destroy'])
	// Route::get('admin/posts/create', [AdminPostController::class, 'create'])
	// Route::post('admin/posts', [AdminPostController::class, 'store'])
});
