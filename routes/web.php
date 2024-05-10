<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\InsertionController;
use App\Http\Controllers\RevisorController;

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

Route::get('/', [PublicController::class, 'home'])->name('homePage');
//rotta index categorie
Route::get('/index/category/{category}', [PublicController::class, 'indexCategory'])->name('indexCategory');

// barra di ricerca
Route::get('/research/insertion', [PublicController::class, 'searchInsertions'])->name('searchInsertions');


//annunci
Route::get('/create/insertion', [InsertionController::class, 'create'])->name('createInsertion');
Route::get('/index/insertion', [InsertionController::class, 'index'])->name('indexInsertion');
Route::get('/show/insertion/{insertion}', [InsertionController::class, 'show'])->name('showInsertion');


//Revisor---------
// Footer Revisor richiesta per diventare revisore
Route::get('/become/revisor',[RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('becomeRevisor');

Route::get('/make/revisor/{user}',[RevisorController::class, 'makeRevisor'])->name('makeRevisor');



//Home Revisor
Route::get('/index/revisor',[RevisorController::class, 'index'])->middleware('isRevisor')->name('indexRevisor');
//Accetta annuncio
Route::patch('/accept/revisor/{insertion}',[RevisorController::class, 'accept'])->middleware('isRevisor')->name('acceptRevisor');
//Rifiuta annuncio
Route::patch('/decline/revisor/{insertion}',[RevisorController::class, 'decline'])->middleware('isRevisor')->name('declineRevisor');

// Cambio lingua

Route::post('/language/{lang}', [PublicController::class, 'setLanguage'])->name('setLanguageLocale');







