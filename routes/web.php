<?php

use App\Http\Controllers\ContentController;
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

Route::redirect('/', 'contents/create');

Route::get('/contents', [ContentController::class, 'index'])->name('content.index');

Route::get('/contents/create', [ContentController::class, 'create'])->name('content.create');
Route::post('/contents/create', [ContentController::class, 'store'])->name('content.store');
Route::get('/contents/{id}/like', [ContentController::class, 'like'])->name('content.like')->where('id', '[0-9]+');
Route::get('/contents/{id}/dislike', [ContentController::class, 'dislike'])->name('content.dislike')->where('id', '[0-9]+');

