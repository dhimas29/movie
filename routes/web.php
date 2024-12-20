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
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
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
         */
        Route::get('/', [MovieController::class, 'index']);

        /**
         * Routing for get data from filter
         */
        // Route::get('/{id}', [MovieController::class, 'show'])->middleware(['isMember']);
        Route::get('/{id}', [MovieController::class, 'show']);

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



Route::middleware('cache.headers:public;max_age=2628000;etag')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/dashboard', function () {
        $user = 'admin';

        return response('Login successfully', 200)->cookie($user);
    });

    Route::get('/logout', function () {
        return redirect()->action([HomeController::class, 'index'], ['authenticated' => false]);
    });

    Route::get('/privacy', function () {
        return 'Privacy page';
    });

    Route::get('/terms', function () {
        return 'Term';
    });
});


Route::get('/external', function () {
    return redirect('/');
});
