<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\VideoController;
use App\Http\Controllers\Admin\VideoController as AdminVideoController;
use App\Http\Controllers\Admin\VideoRequestController as AdminVideoRequestController;
use App\Http\Controllers\Customer\VideoRequestController as CustomerVideoRequestController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/videos', [VideoController::class, 'index'])->name('videos.index');
    Route::get('/videos/{video}', [VideoController::class, 'show'])->name('videos.show');

    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
        Route::resource('videos', AdminVideoController::class);
        Route::resource('video-requests', AdminVideoRequestController::class)->only(['index']);
        Route::put('video-requests/{videoRequest}/approve', [AdminVideoRequestController::class, 'approve'])->name('video-requests.approve');
        Route::put('video-requests/{videoRequest}/reject', [AdminVideoRequestController::class, 'reject'])->name('video-requests.reject');
    });

    Route::middleware('role:customer')->prefix('customer')->name('customer.')->group(function () {
        Route::post('video-requests', [CustomerVideoRequestController::class, 'store'])->name('video-requests.store');
        Route::get('video-requests', [CustomerVideoRequestController::class, 'index'])->name('video-requests.index');
    });
});
