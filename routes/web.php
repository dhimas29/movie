<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

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

Route::group(
    [
        'middleware' => ['isAuth'],
        'prefix' => 'movie',
        'as' => 'movie.'
    ],function () use ($movies) {

        Route::get('/', [MovieController::class, 'index']);
        Route::get('/{id}', [MovieController::class, 'show'])->middleware(['isMember']);
        Route::post('/', [MovieController::class, 'store']);
        Route::put('/{id}', [MovieController::class, 'update']);

        Route::delete('/{id}', function ($id) use($movies) {
            unset($movies[$Id]);

            return $movies;
        });

});



Route::get('/pricing', function () {
    return 'Please, buy a membership';
});

Route::get('/login', function() {
    return 'Login Page';
})->name('login');
