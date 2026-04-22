<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// ==========================================
// 1. PUBLIC PAGES
// ==========================================
Route::get('/', function () {
    return view('home.index');
})->name('home');

Route::get('/rooms', function () {
    return view('home.rooms');
})->name('rooms');

Route::get('/rooms/{id}', function ($id) {
    return view('home.room-detail');
})->name('rooms.show');


// ==========================================
// 2. AUTH PAGES
// ==========================================
Route::view('/login', 'auth.login')->name('login');
Route::view('/register', 'auth.register')->name('register');
Route::view('/forgot-password', 'auth.forgot-password')->name('password.request');
Route::post('/logout', function () {
    // kalau belum pakai auth system, minimal redirect dulu
    return redirect()->route('home');
})->name('logout');


// ==========================================
// 3. BOOKING (Tenant perspective)
// ==========================================
Route::prefix('booking')->name('booking.')->group(function () {
    Route::view('/create', 'booking.create')->name('create');
    Route::view('/upload-dp', 'booking.upload-dp')->name('upload-dp');
    Route::view('/confirmation', 'booking.confirmation')->name('confirmation');
    Route::view('/status', 'booking.status')->name('status');
});


// ==========================================
// 4. OWNER DASHBOARD
// ==========================================
Route::prefix('dashboard')->name('dashboard.')->group(function () {
    Route::view('/', 'dashboard.index')->name('index');
    Route::view('/rooms', 'dashboard.rooms')->name('rooms');
    Route::view('/room-form', 'dashboard.room-form')->name('room-form');
});


// ==========================================
// 5. TENANT MANAGEMENT
// ==========================================
Route::prefix('tenants')->name('tenants.')->group(function () {
    Route::view('/', 'tenants.index')->name('index');
    Route::view('/create', 'tenants.create')->name('create');
    Route::view('/contract', 'tenants.contract')->name('contract');
    Route::get('/{id}', function ($id) {
        return view('tenants.show');
    })->name('show');
    Route::get('/{id}/edit', function ($id) {
        return view('tenants.edit');
    })->name('edit');
});


// ==========================================
// 6. PAYMENTS
// ==========================================
Route::prefix('payments')->name('payments.')->group(function () {
    Route::view('/', 'payments.index')->name('index');
    Route::view('/upload', 'payments.upload')->name('upload');
    Route::view('/verify', 'payments.verify')->name('verify');
    Route::view('/qris', 'payments.qris')->name('qris');
    Route::get('/{id}', function ($id) {
        return view('payments.show');
    })->name('show');
});


// ==========================================
// 7. REMINDERS
// ==========================================
Route::prefix('reminders')->name('reminders.')->group(function () {
    Route::view('/', 'reminders.index')->name('index');
    Route::view('/settings', 'reminders.settings')->name('settings');
});


// ==========================================
// 8. REPORTS
// ==========================================
Route::prefix('reports')->name('reports.')->group(function () {
    Route::view('/', 'reports.index')->name('index');
    Route::view('/income', 'reports.income')->name('income');
    Route::view('/occupancy', 'reports.occupancy')->name('occupancy');
});


// ==========================================
// 9. COMPLAINTS
// ==========================================
Route::prefix('complaints')->name('complaints.')->group(function () {
    Route::view('/', 'complaints.index')->name('index');
    Route::view('/create', 'complaints.create')->name('create');
    Route::view('/my-complaints', 'complaints.my-complaints')->name('my');
    Route::get('/{id}', function ($id) {
        return view('complaints.show');
    })->name('show');
});


// ==========================================
// 10. PROFILE
// ==========================================
Route::prefix('profile')->name('profile.')->group(function () {
    Route::view('/', 'profile.index')->name('index');
    Route::view('/edit', 'profile.edit')->name('edit');
});


// ==========================================
// 11. ERROR PAGES (Simulations)
// ==========================================
Route::view('/404-demo', 'errors.404')->name('errors.404');
Route::view('/403-demo', 'errors.403')->name('errors.403');
