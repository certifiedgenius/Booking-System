<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\BarberController;
use App\Http\Controllers\CustomerController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



// ADMIN
// To get the Appointments route in AdminDashboard
Route::get('/admin/appointments', [AppointmentController::class, 'index'])->name('appointments');

// To get the Customers route in AdminDashboard
Route::get('/admin/customers', [CustomerController::class, 'index'])->name('customers');
Route::get('/admin/customers/{id}', [CustomerController::class, 'show'])->name('customers.show');
Route::post('/admin/customers/edit/{id}', [CustomerController::class, 'update'])->name('customers.update');
Route::post('/admin/customers/delete/{id}', [CustomerController::class, 'destroy'])->name('customers.destroy');



// USER
// To get the Appointments to create in user interface
Route::get('/user/appointments', [AppointmentController::class, 'create']);

// To POST the Appointments to create a new Appointment.
Route::post('/user/appointments/store', [AppointmentController::class, 'store'])->name('appointments.store');