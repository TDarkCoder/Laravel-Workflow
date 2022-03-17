<?php

use App\Http\Controllers\PullRequestController;
use App\Http\Controllers\WorkflowController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => redirect(route('pull-request.index')))->name('home');
Route::group(['controller' => PullRequestController::class, 'prefix' => 'pull-request'], function () {
    Route::name('pull-request.')->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('{pullRequest}', 'show')->name('show');
        Route::put('{pullRequest}', 'update')->name('update');
    });
});
Route::group(['controller' => WorkflowController::class, 'prefix' => 'workflow'], function () {
    Route::name('workflow.')->group(function () {
        Route::get('/', 'index')->name('index');
    });
});
