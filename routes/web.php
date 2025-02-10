<?php
use Illuminate\Http\Request;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


// Authentication routes
Auth::routes();

// Welcome route
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Dashboard route (authenticated users only)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
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
    Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');
    Route::get('/companies/create', [CompanyController::class, 'create'])->name('companies.create'); 
    Route::post('/companies', [CompanyController::class, 'store'])->name('companies.store'); 
    Route::get('/companies/{company}', [CompanyController::class, 'show'])->name('companies.show');
});

// Invoice-related routes
Route::middleware('auth')->group(function () {
    Route::get('/companies/{company}/invoices/pdf', [InvoiceController::class, 'generatePdf'])->name('invoices.pdf');
    Route::resource('invoices', InvoiceController::class);
    Route::post('invoices/{invoice}/delete', [InvoiceController::class, 'delete'])->name('invoices.delete');
    Route::delete('invoices/{invoice}/forceDelete', [InvoiceController::class, 'forceDelete'])->name('invoices.forceDelete');
});

// Customer-related routes
Route::middleware('auth')->group(function () {
    Route::resource('customers', CustomerController::class);
});

// Home route after login
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
