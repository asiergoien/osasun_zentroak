<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\CommentsController;

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
    return view('index');
});

Route::get('/index', function () {
    return view('index');
});
Route::get('/osasun-zentroak', function () {
    return view('osasunZentroak');
});
Route::get('/informazioa', function () {
    return view('informazioa');
});
Route::get('/profila', function() {
    return view('profila');
});


Route::resource('likes', LikesController::class);
Route::resource('comments', CommentsController::class);
Route::post('like', [LikesController::class, 'addLike']);
Route::delete('disLike', [LikesController::class, 'disLike']);
Route::get('viewLike', [LikesController::class, 'isLiked']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
