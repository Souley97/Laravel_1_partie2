<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentairController;
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
    Route::get('/article/{id}', 'show')->name('article.details');

    // modifier d'une article
    Route::get('/article/{id}/edit', 'edit')->name( 'article.edit' );
    Route::put('/article/{id}', 'update')->name( 'article.update' );

    // suppresion d'une article
    Route::delete('/article/{id}', 'destroy')->name( 'article.delete' );


});


// Route: Commentaire
Route::controller(CommentairController::class)->group( function (){

    Route::post('articles/{article}/comments','store')->name('comments.store');
    
    Route::delete('/commentaire/{id}', 'destroy')->name( 'commentaire.delete' );


});

