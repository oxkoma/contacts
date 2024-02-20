<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersoneResourceController;
use App\Http\Controllers\PhoneResourceController;
use App\Http\Controllers\ContactResourceController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resources([
    'persones' => PersoneResourceController::class,
    'phones' => PhoneResourceController::class,
    'contacts' => ContactResourceController::class
]);