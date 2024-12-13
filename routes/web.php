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

Route::get('/', function () {
    return view('welcome');
});

$movies = [];

for ($i = 0; $i < 10; $i++) {
    $movies[] = [
        'title'=> 'Title'. $i,
        'year'=> '2024',
        'genre'=> 'Action'
    ];
}

Route::get('/movie', function () use($movies) {
    return $movies;
});

Route::post('/movie', function () use($movies) {
    $movies[] = [
        'title' => request('title'),
        'year'=> request('year'),
        'genre' => request('genre')
    ];

    return $movies;
});

Route::put('/movie', function () use($movies) {
    $movies[2]['title'] = request('title');
    $movies[2]['year'] = request('year');
    $movies[2]['genre'] = request('genre');

    return $movies;
});
