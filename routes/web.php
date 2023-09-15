<?php

use App\Http\Controllers\Admin\DashboardController;

use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\TyperTitleController;
use App\Http\Controllers\Frontend\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('portfolio-details/{id}', [HomeController::class, 'showPortfolio'])->name('show.portfolio');
Route::get('blog-details/{id}', [HomeController::class, 'showBlog'])->name('show.blog');
Route::get('blogs', [HomeController::class, 'blog'])->name('blog');
Route::post('contact', [HomeController::class, 'contact'])->name('contact');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function(){

    Route::resource('hero', HeroController::class);
    Route::resource('typer-title', TyperTitleController::class);
});

require __DIR__.'/auth.php';
