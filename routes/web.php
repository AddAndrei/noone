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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [App\Http\Controllers\MainController::class, 'index'])->name('main.index');

Route::prefix('articles')->group(function(){
    $controller = App\Http\Controllers\ArticlesController::class;
    Route::get('/', [$controller, 'index'])->name('articles.index');
    Route::get('/{slug}', [$controller, 'article'])->name('articles.article');
});

