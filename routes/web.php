<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use Illuminate\Http\Request;

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
    return view('app');
});

$movies = [];

Route::group(
    [
        // 'middleware' => ['isAuth'],
        'prefix' => 'movie',
        'as' => 'movie.'
    ],
    function () use ($movies) {
        /**
         * Routing for get all data
         * Route('movie.index)
         */
        Route::get('/', [MovieController::class, 'index'])->name('index');

        /**
         * Routing for form insert data
         * Makeure for create its above in route show
         * cause if in bottom show this route will be override show
         */
        Route::get('/create', [MovieController::class, 'create'])->name('create');

        /**
         * Routing for get data from filter
         */
        // Route::get('/{id}', [MovieController::class, 'show'])->middleware(['isMember']);
        Route::get('/{id}', [MovieController::class, 'show'])->name('show');

        /**
         * Routing for insert data
         */
        Route::post('/', [MovieController::class, 'store']);

        /**
         * Routing for update data with parameter id
         */
        Route::put('/{id}', [MovieController::class, 'update']);

        /**
         * Routing for delete data with parameter id
         */
        Route::delete('/{id}', [MovieController::class, 'destroy']);
    }
);

Route::get('/request', function (Request $request) {
    $data = $request->date('schedulee', 'Y-m-d', 'Asia/Jakartas');

    /**
     * Function for calculate date from date request and date now
     */
    return $data->diffForHumans();
});

Route::post('/request', function (Request $request) {
    if ($request->has('name')) {
        return 'Name: ' . $request->input('email');
    }

    return false;
});

Route::get('/pricing', function () {
    return 'Please, buy a membership';
});

Route::get('/login', function () {
    return 'Login Page';
})->name('login');
