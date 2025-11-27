<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminPetController;
use App\Http\Controllers\Admin\AdoptionRequestController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\MpesaController;
Route::post('/api/mpesa/callback', [MpesaController::class, 'callback']);
// Mpesa STK Push Request
Route::post('/mpesa/stkpush', [MpesaController::class, 'stkPush'])->name('mpesa.stk');

// Mpesa Callback
Route::post('/mpesa/callback', [MpesaController::class, 'callback']);








/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact/send', [HomeController::class, 'send'])->name('contact.send');

// Browse pets (public)
Route::get('/pets', [PetController::class, 'browse'])->name('browse.pets');
Route::get('/pets/{id}', [PetController::class, 'show'])->name('pets.show');

/*
|--------------------------------------------------------------------------
| Authenticated User Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    // Updated User Dashboard route
    Route::get('/dashboard', [PetController::class, 'userDashboard'])
        ->name('dashboard');

    // Process page for adoption/buy
    Route::get('/pets/{id}/process', [PetController::class, 'process'])->name('pets.process');

    // Finalize adoption
    Route::post('/pets/{id}/finalizeAdoption', [PetController::class, 'finalizeAdoption'])
        ->name('pets.finalizeAdoption');

    // Finalize buy
    Route::post('/pets/{id}/finalizeBuy', [PetController::class, 'finalizeBuy'])
        ->name('pets.finalizeBuy');

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')->name('admin.')
    ->group(function () {

    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::resource('pets', AdminPetController::class);

    Route::get('/adoptions', [AdoptionRequestController::class, 'index'])->name('adoptions');
    Route::post('/adoptions/{id}/approve', [AdoptionRequestController::class, 'approve'])->name('adoptions.approve');
    Route::post('/adoptions/{id}/reject', [AdoptionRequestController::class, 'reject'])->name('adoptions.reject');

    Route::get('/users', [AdminUserController::class, 'index'])->name('users');

    // Reports routes
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('/reports/purchases', [ReportController::class, 'purchases'])->name('reports.purchases');
    Route::get('/reports/adoptions', [ReportController::class, 'adoptions'])->name('reports.adoptions');
    Route::get('/reports/users', [ReportController::class, 'users'])->name('reports.users');
    Route::get('/reports/purchases/export', [ReportController::class, 'exportPurchases'])->name('reports.exportPurchases');
    Route::get('/reports/adoptions/export', [ReportController::class, 'exportAdoptions'])->name('reports.exportAdoptions');
});

require __DIR__ . '/auth.php';
