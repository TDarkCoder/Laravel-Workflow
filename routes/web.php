<?php

use App\Http\Controllers\PullRequestController;
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

Route::group(['controller' => PullRequestController::class, 'prefix' => 'pull-request'], function () {
    Route::name('pull-request.')->group(function() {
        Route::get('{pullRequest}', 'show')->name('show');
        Route::put('{pullRequest}', 'update')->name('update');
    });
});
