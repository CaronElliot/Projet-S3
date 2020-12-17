<?php

use Illuminate\Support\Facades\Route;


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

Route::get('/',[\App\Http\Controllers\HomeController::class,'index'])->name('accueil');


Route::get('/enonce', function () {
    return view('enonce.index');
});

Route::get('/test',[\App\Http\Controllers\HomeController::class,'jeu'])->name('test');
Route::match(['post'], '/commentaire',[\App\Http\Controllers\JeuController::class,'commentaire'])->name('commentaire');
Route::post('/ajouterAchat', [\App\Http\Controllers\JeuController::class, 'ajouterAchat'])->name('ajouterAchat');

Route::resource('jeu', \App\Http\Controllers\JeuController::class);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/jeu/{id}/regles', [\App\Http\Controllers\JeuController::class, 'regles'])->name('jeu.regles');

Route::get('/profil',[\App\Http\Controllers\JeuController::class,'profil'])->name('profil');

Route::get('/logout',[\App\Http\Controllers\LoginController::class,'logout'])->name('logout');
