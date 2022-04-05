<?php

use App\Http\Controllers\SakilaController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\CityController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



require __DIR__.'/auth.php';

Route::resource('alquilers', SakilaController::class)->middleware(['auth']);
Route::resource('films', FilmController::class)->middleware(['auth']);


Route::post('/films/grafico', 'App\Http\Controllers\FilmController@graficoCrear')->name('film.grafico');

Route::resource('citys', CityController::class)->middleware(['auth']);
//Route::resource('dashboard', FilmController::class)->middleware(['auth']);

