<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    $path = storage_path('app/cms.json');
    $cmsData = file_exists($path) ? (json_decode(file_get_contents($path), true) ?? []) : [];

    $settings = [];
    foreach ($cmsData as $section) {
        if (isset($section['fields'])) {
            foreach ($section['fields'] as $key => $field) {
                $settings[$key] = $field['value'];
            }
        }
    }

    return view('welcome', compact('settings'));
});

Route::post('/enquiry', [EnquiryController::class, 'store'])->name('enquiry.store');

// Admin Routes
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login']);
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');

    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/enquiries', [AdminController::class, 'enquiries'])->name('admin.enquiries');
        Route::get('/settings', [AdminController::class, 'settings'])->name('admin.settings');
        Route::post('/settings', [AdminController::class, 'updateSettings'])->name('admin.settings.update');
    });
});
