<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PhoneConnController;

Route::get('/', function () {
    return view('welcome');
});


// ** For Auth ** //
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('registerpost', [AuthController::class, 'registerpost'])->name('registerpost');
Route::post('loginpost', [AuthController::class, 'loginpost'])->name('loginpost');
Route::post('logout', [AuthController::class, 'destroy'])->name('logout');



// ** For Admin ** //
//  we can't go to customer views if the user is in the admin role.

Route::middleware('is_admin:admin')->group(function () {
    Route::get('admin/phone-connection', [AdminController::class, 'index'])->name('admin');
    Route::put('admin/phone-connection/update/{id}', [AdminController::class, 'update'])->name('admin.pho.update');
});




// ** For Customer ** //
// we can't go to admin views if the user is in the customer role.

Route::middleware(['auth', 'is_admin:customer'])->group(function () {
    Route::get('phone-connection', [PhoneConnController::class, 'index'])->name('pho.home');
    Route::get('phone-connection/create', [PhoneConnController::class, 'create'])->name('pho.create');
    Route::get('phone-connection/edit/{id}', [PhoneConnController::class, 'edit'])->name('pho.edit');
    Route::post('phone-connection/store', [PhoneConnController::class, 'store'])->name('pho.store');
    Route::put('phone-connection/update/{id}', [PhoneConnController::class, 'update'])->name('pho.update');
    Route::delete('phone-connection/delete/{id}', [PhoneConnController::class, 'destroy'])->name('pho.delete');
});



