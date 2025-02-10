<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Authentication routes
Auth::routes();

// Welcome route
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Dashboard route with authentication middleware
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile routes for logged-in users
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// Admin routes for adding users manually
Route::middleware(['auth'])->group(function () {
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
});

// Company-related routes
Route::middleware('auth')->group(function () {
    Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');
    Route::get('/companies/create', function () {
        return view('companies.create');
    })->name('companies.create');
    Route::post('/companies', [CompanyController::class, 'store'])->name('companies.store')->middleware('auth');
    Route::get('/companies/{company}', [CompanyController::class, 'show'])->name('companies.show');
});

// Invoice-related routes
Route::middleware('auth')->group(function () {
    Route::get('/companies/{company}/invoices/pdf', [InvoiceController::class, 'generatePdf'])->name('invoices.pdf');
    Route::resource('invoices', InvoiceController::class);
});

// Customer-related routes
Route::middleware('auth')->group(function () {
    Route::resource('customers', CustomerController::class);
});

// Home route for after login
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
