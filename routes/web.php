<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProjectController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

//Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/project', [ProjectController::class, 'index'])->name('project');
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::post('/news/create', [NewsController::class, 'store'])->name('news.store');
Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');
Route::get('/categories', [CategoryController::class, 'index'])->name('cat.index');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('cat.show');
