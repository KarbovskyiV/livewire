<?php

use App\Http\Controllers\ProductController;
use App\Livewire\CreatePost;
use App\Livewire\Products;
use App\Livewire\ProductsCreate;
use App\Livewire\ShowHelp;
use App\Livewire\ShowPost;
use App\Livewire\TodosList;
use App\Livewire\ViewPost;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;

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
    return view('home');
})->name('home');

Route::get('users', [UserController::class, 'index'])->name('users.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('products', Products::class);
Route::get('products/create', ProductsCreate::class)->name('products.create');

Route::get('posts/create', CreatePost::class);
Route::view('posts/{post}/edit', 'posts.edit');
Route::get('help', ShowHelp::class);
Route::get('show-post', ShowPost::class);
Route::get('post/{post}', ViewPost::class);

Route::get('todos', TodosList::class);

require __DIR__.'/auth.php';
