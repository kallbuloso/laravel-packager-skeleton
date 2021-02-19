<?php

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

Route::get('/sample', function () {
    dd('hi sample');
});


Route::prefix(':lc:package')->group(function() {
    // Route::group(['middleware' => ['auth', 'verified'], 'prefix' => ':lc:package'], function() {
    // Route::get('/', [:uc:packageController::class, 'index'])->name(':lc:package');
});