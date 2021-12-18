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



Route::get('/musicas', [MusicaController::class,'index'])->name('musicas.index');
Route::get('/musicas/create', [MusicaController::class,'create'])->name('musicas.create');
Route::post('/musicas', [MusicaController::class,'store'])->name('musicas.store');
Route::get('/musicas/{musica}', [MusicaController::class,'show'])->name('musicas.show');
Route::get('/musicas/{musica}/edit', [MusicaController::class,'edit'])->name('musicas.edit');
Route::put('/musicas/{musica}', [MusicaController::class,'update'])->name('musicas.update');
Route::delete('/musicas/{musica}', [MusicaController::class,'destroy'])->name('musicas.destroy');



Route::get('/playlists', [PlaylistController::class,'index'])->name('playlists.index');
Route::get('/playlists/create', [PlaylistController::class,'create'])->name('playlists.create');
Route::post('/playlists', [PlaylistController::class,'store'])->name('playlists.store');
Route::get('/playlists/{playlist}', [PlaylistController::class,'show'])->name('playlists.show');
Route::get('/playlists/{playlist}/edit', [PlaylistController::class,'edit'])->name('playlists.edit');
Route::put('/playlists/{playlist}', [PlaylistController::class,'update'])->name('playlists.update');
Route::delete('/playlists/{playlist}', [PlaylistController::class,'destroy'])->name('playlists.destroy');



Route::get('/albuns', [AlbumController::class,'index'])->name('albuns.index');
Route::get('/albuns/create', [AlbumController::class,'create'])->name('albuns.create');
Route::post('/albuns', [AlbumController::class,'store'])->name('albuns.store');
Route::get('/albuns/{album}', [AlbumController::class,'show'])->name('albuns.show');
Route::get('/albuns/{album}/edit', [AlbumController::class,'edit'])->name('albuns.edit');
Route::put('/albuns/{album}', [AlbumController::class,'update'])->name('albuns.update');
Route::delete('/albuns/{album}', [AlbumController::class,'destroy'])->name('albuns.destroy');



Route::get('/generos', 'App\Http\Controllers\GeneroController@index')->name('generos.index');
Route::get('/generos/create', 'App\Http\Controllers\GeneroController@create')->name('generos.create');
Route::post('/generos', 'App\Http\Controllers\GeneroController@store')->name('generos.store');
Route::get('/generos/{genero}', 'App\Http\Controllers\GeneroController@show')->name('generos.show');
Route::get('/generos/{genero}/edit', 'App\Http\Controllers\GeneroController@edit')->name('generos.edit');
Route::put('/generos/{genero}', 'App\Http\Controllers\GeneroController@update')->name('generos.update');
Route::delete('/generos/{genero}', 'App\Http\Controllers\GeneroController@destroy')->name('generos.destroy');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
