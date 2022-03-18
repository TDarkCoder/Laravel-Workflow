<?php

use App\Http\Controllers\PullRequestController;
use App\Http\Controllers\WorkflowUploadController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => redirect(route('pull-request.index')))->name('home');
Route::group(['controller' => PullRequestController::class, 'prefix' => 'pull-request'], function () {
    Route::name('pull-request.')->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('{pullRequest}', 'show')->name('show');
        Route::put('{pullRequest}', 'update')->name('update');
    });
});
Route::group(['controller' => WorkflowUploadController::class, 'prefix' => 'workflow-upload'], function () {
    Route::name('workflow-upload.')->group(function () {
        Route::get('list', 'index')->name('index');
        Route::get('{workflowUpload?}', 'show')->name('show');
        Route::post('{workflowUpload?}', 'save')->name('save');
    });
});
