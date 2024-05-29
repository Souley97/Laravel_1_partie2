<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(ArticleController::class)->group(function () {

    //Affichage des articles
    Route::get('articles', 'index')->name('article.index');

    // ajoute d'une article
    Route::get('/article/create', 'create')->name('article.create');
    Route::post('article/store', 'store')->name('article.store');

    //Affichage d'une article
    Route::get('/article/{id}', 'show')->name('article.detais');


});
