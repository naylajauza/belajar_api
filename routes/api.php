<?php
use App\Http\Controllers\Api\KategoriController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\GenreController;
use App\Http\Controllers\Api\ActorController;
use App\Http\Controllers\Api\FilmController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// route kategori
Route::get('kategori', [KategoriController::class, 'index']);
Route::post('kategori', [KategoriController::class, 'store']);
Route::get('kategori/{id}', [KategoriController::class, 'show']);
Route::put('kategori/{id}', [KategoriController::class, 'update']);
Route::delete('kategori/{id}', [KategoriController::class, 'destroy']);

// route genre
Route::get('genre', [GenreController::class, 'index']);
Route::post('genre', [GenreController::class, 'store']);
Route::get('genre/{id}', [GenreController::class, 'show']);
Route::put('genre/{id}', [GenreController::class, 'update']);
Route::delete('genre/{id}', [GenreController::class, 'destroy']);

// route actor
Route::get('actor', [ActorController::class, 'index']);
Route::post('actor', [ActorController::class, 'store']);
Route::get('actor/{id}', [ActorController::class, 'show']);
Route::put('actor/{id}', [ActorController::class, 'update']);
Route::delete('actor/{id}', [ActorController::class, 'destroy']);

// route film
Route::get('film', [FilmController::class, 'index']);
Route::post('film', [FilmController::class, 'store']);
Route::get('film/{id}', [FilmController::class, 'show']);
Route::put('film/{id}', [FilmController::class, 'update']);
Route::delete('film/{id}', [FilmController::class, 'destroy']);

//login
Route::post('login',[LoginController::class, 'authenticate']);

//logout
Route::post('logout',[LoginController::class, 'logout'])
   ->middleware('auth:sanctum');

//register
Route::post('register',[LoginController::class, 'register']);

