<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'web','as' => 'web.'], function () {
    Route::resource('customer',CustomerController::class);
});
