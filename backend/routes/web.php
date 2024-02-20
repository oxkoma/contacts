<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersoneResourceController;
use App\Http\Controllers\PhoneResourceController;
use App\Http\Controllers\ContactResourceController;

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
    return view('test');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');*/
Route::get('/', function () {
    return view('home');
})->name('home');

Route::resources([
    'persones' => PersoneResourceController::class,
    'phones' => PhoneResourceController::class,
    'contacts' => ContactResourceController::class
]);