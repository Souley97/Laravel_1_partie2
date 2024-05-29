<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(ArticleController::class)->group(function () {

    //Affichage des articles
        Route::get('articles', 'index')->name('article.index');

    });
