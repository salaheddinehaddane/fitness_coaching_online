<?php

use App\Http\Controllers\CoachController;
use App\Http\Controllers\loginsController;
use App\Http\Controllers\InscrireController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/coach/{any}', function () {
    return view('coach');
})->where('any', '.*')
    ->name("coach");
// ->middleware('is_coach')

Route::get('/renouveler', function () {
    return view('renouveler');
})->name("renouveler")
    // ->middleware('is_coach')
;
Route::get(
    '/invitation/{any}',
    function () {
        return view('couch_me');
    }
)->where('any', '.{0,9}')->name("cach")
    // ->middleware('is_coach')
;

Route::get('/client/{any}', function () {
    return view('client');
})->name("client")
    ->where('any', '.*')
    // ->middleware('is_client')
;
Route::get('/admin/{any}', function () {
    return view('admin');
})->name("admin")
    ->where('any', '.*')
    // ->middleware('is_admin')
;
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/inscrire', function () {
    return view('inscrire');
})->name('inscrire');

Route::get('/motpasseoublie', function () {
    return view('motPasse');
})->name('motPasse');

// Route::post('/login', [LoginController::class, 'login']);

Route::post('/login', [loginsController::class, 'login']);
// Route::get('/coach_me/{id}',[CoachController::class,'inscrire']);
