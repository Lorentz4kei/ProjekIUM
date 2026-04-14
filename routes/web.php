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
});
Route::get('/rooms', function () {
    return view('home.rooms');
});
Route::view('/rooms/1', 'home.room-detail');


// ==========================================
// 2. AUTH PAGES
// ==========================================
Route::view('/login', 'auth.login');
Route::view('/register', 'auth.register');
Route::view('/forgot-password', 'auth.forgot-password');


// ==========================================
// 3. BOOKING (Tenant perspective)
// ==========================================
Route::prefix('booking')->group(function () {
    Route::view('/create', 'booking.create');
    Route::view('/upload-dp', 'booking.upload-dp');
    Route::view('/confirmation', 'booking.confirmation');
    Route::view('/status', 'booking.status');
});


// ==========================================
// 4. OWNER DASHBOARD
// ==========================================
Route::prefix('dashboard')->group(function () {
    Route::view('/', 'dashboard.index');
    Route::view('/rooms', 'dashboard.rooms');
    Route::view('/room-form', 'dashboard.room-form');
});


// ==========================================
// 5. TENANT MANAGEMENT
// ==========================================
Route::prefix('tenants')->group(function () {
    Route::view('/', 'tenants.index');
    Route::view('/create', 'tenants.create');
    Route::view('/contract', 'tenants.contract');
    Route::view('/{id}', 'tenants.show');
    Route::view('/{id}/edit', 'tenants.edit');
});


// ==========================================
// 6. PAYMENTS
// ==========================================
Route::prefix('payments')->group(function () {
    Route::view('/', 'payments.index');
    Route::view('/upload', 'payments.upload');
    Route::view('/verify', 'payments.verify');
    Route::view('/qris', 'payments.qris');
    Route::view('/{id}', 'payments.show');
});


// ==========================================
// 7. REMINDERS
// ==========================================
Route::prefix('reminders')->group(function () {
    Route::view('/', 'reminders.index');
    Route::view('/settings', 'reminders.settings');
});


// ==========================================
// 8. REPORTS
// ==========================================
Route::prefix('reports')->group(function () {
    Route::view('/', 'reports.index');
    Route::view('/income', 'reports.income');
    Route::view('/occupancy', 'reports.occupancy');
});


// ==========================================
// 9. COMPLAINTS
// ==========================================
Route::prefix('complaints')->group(function () {
    Route::view('/', 'complaints.index');
    Route::view('/create', 'complaints.create');
    Route::view('/my-complaints', 'complaints.my-complaints');
    Route::view('/{id}', 'complaints.show');
});


// ==========================================
// 10. PROFILE
// ==========================================
Route::prefix('profile')->group(function () {
    Route::view('/', 'profile.index');
    Route::view('/edit', 'profile.edit');
});


// ==========================================
// 11. ERROR PAGES (Simulations)
// ==========================================
Route::view('/404-demo', 'errors.404');
Route::view('/403-demo', 'errors.403');
