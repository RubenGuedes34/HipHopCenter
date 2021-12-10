<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HipHopCenterController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\MusicaController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GeneroController;

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
    return view("index");
});


Route::get('/index',[HipHopCenterController::class,'index']);
Route::get('/autenticacao',[HipHopCenterController::class,'autenticacao']);
Route::get('/homepage',[HipHopCenterController::class,'homepage']);






Route::get('/artists', [ArtistController::class,'index'])->name('artists.index');
Route::get('/artists/create', [ArtistController::class,'create'])->name('artists.create');
Route::post('/artists', [ArtistController::class,'store'])->name('artists.store');
Route::get('/artists/{artist}', [ArtistController::class,'show'])->name('artists.show');
Route::get('/artists/{artist}/edit', [ArtistController::class,'edit'])->name('artists.edit');
Route::put('/artists/{artist}', [ArtistController::class,'update'])->name('artists.update');
Route::delete('/artists/{artist}', [ArtistController::class,'destroy'])->name('artists.destroy');