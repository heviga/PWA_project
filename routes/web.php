<?php

use Illuminate\Http\Request;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController; // Missing AdminController Import
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;

// Authentication routes
Auth::routes();

// Welcome route
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Dashboard routes for users and admins
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard'); 
    })->name('dashboard'); // 
    // Admin Dashboard
    Route::get('/admin/dashboard', [AdminController::class, 'index'])
        ->middleware('auth')
        ->name('admin.dashboard');
});

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
    Route::get('/companies/create', [CompanyController::class, 'create'])->name('companies.create'); 
    Route::post('/companies', [CompanyController::class, 'store'])->name('companies.store'); 
    Route::resource('companies', CompanyController::class);
    Route::delete('/companies/{company}', [CompanyController::class, 'destroy'])->name('companies.destroy');
    Route::get('/companies/{company}/edit', [CompanyController::class, 'edit'])->name('companies.edit');
    Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');
});
//neprihlaseni
Route::get('/companies/{company}/export-pdf', [CompanyController::class, 'exportPDF'])->name('companies.export-pdf');
Route::get('/companies/{company}', [CompanyController::class, 'show'])->name('companies.show');
Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');


// Invoice-related routes
Route::middleware('auth')->group(function () {
    Route::delete('invoices/{invoice}/destroy', [InvoiceController::class, 'destroy'])->name('invoices.delete');
    Route::get('/invoices/create', [InvoiceController::class, 'create'])->name('invoices.create');
    Route::post('/invoices', [InvoiceController::class, 'store'])->name('invoices.store');
    Route::delete('invoices/{invoice}/forceDelete', [InvoiceController::class, 'forceDelete'])->name('invoices.forceDelete');
    Route::resource('invoices', InvoiceController::class);

});
Route::get('/invoices', [InvoiceController::class, 'index'])->name('invoices.index');//aj pre neprihlasenych
Route::get('/invoices/{invoice}/pdf', [InvoiceController::class, 'generateInvoicePdf'])->name('invoices.pdf');
Route::get('/invoices/{invoice}', [InvoiceController::class, 'show']);

// Customer-related routes
Route::middleware('auth')->group(function () {
    Route::resource('customers', CustomerController::class);
});

// Home route after login
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', function () {
    return view('dashboard'); 
})->name('dashboard');//logout

// Login Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
