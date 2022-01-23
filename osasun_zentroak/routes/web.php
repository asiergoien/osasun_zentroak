<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\ProfilaController;
use App\Http\Controllers\GrafikoController;

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

// Route::get('/', function () { 
//     return view('index');
// });
Route::get('/', [GrafikoController::class, 'index']);

Route::get('/index', function () {
    return view('index');
});
Route::get('/osasun-zentroak', function () {
    return view('osasunZentroak');
});
Route::get('/informazioa', function () {
    return view('informazioa');
});


Route::get('/profila', [ProfilaController::class, 'index'])->middleware('auth');
Route::put('/profila/{id}', [ProfilaController::class, 'update'])->middleware('auth');

Route::resource('likes', LikesController::class);
Route::resource('comments', CommentsController::class);
// RUTAS PARA LOS LIKES
Route::post('like', [LikesController::class, 'addLike']);
Route::delete('disLike', [LikesController::class, 'disLike']);
Route::get('viewLike', [LikesController::class, 'isLiked']);
// RUTAS PARA LOS COMENTARIOS
Route::post('addComment', [CommentsController::class, 'addComment']);
Route::get('viewComments', [CommentsController::class, 'viewComments']);




Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
