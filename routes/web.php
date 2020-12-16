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

Route::match(['post'],'/jeu', [\App\Http\Controllers\JeuController::class, 'commentaire'])->name('jeu.commentaire');

Route::resource('jeu', \App\Http\Controllers\JeuController::class);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('jeu', \App\Http\Controllers\JeuController::class);

Route::get('/jeu/{id}/regles', [\App\Http\Controllers\JeuController::class, 'regles', ])->name('jeu.regles');
