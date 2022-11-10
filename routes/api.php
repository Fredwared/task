<?php

use App\Http\Controllers\Api\AppointmentController;
use Illuminate\Support\Facades\Route;

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
Route::group(['prefix' => 'appointment', 'as' => 'appointment.'], function(){
    Route::get('', [AppointmentController::class, 'estimate'])->name('estimate');
    Route::post('{user:uuid}', [AppointmentController::class, 'booking']);
});
