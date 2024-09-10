<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

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


Route::get('/', [AuthController::class, 'index'])->name('index');
Route::post('/loginPost', [AuthController::class, 'loginPost'])->name('loginPost');

// Register
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/registerPost', [AuthController::class, 'registerPost'])->name('registerPost');

// Logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth.check:admin']], function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // registration
    Route::get('/admin/registration', [AdminController::class, 'registration'])->name('admin.registration');
    Route::get('/admin/registration/detail/{id}', [AdminController::class, 'registrationDetail'])->name('admin.registration.detail');
    Route::post('/admin/registration/reject', [AdminController::class, 'registrationReject'])->name('admin.registration.reject');
    Route::get('/admin/registration/accept/{id}', [AdminController::class, 'registrationAccept'])->name('admin.registration.accept');
    // Payment
    Route::get('/admin/payment/formulir', [AdminController::class, 'paymentFormulir'])->name('admin.payment.formulir');
    Route::get('/admin/payment/formulir/accept/{id}', [AdminController::class, 'paymentFormulirAccept'])->name('admin.payment-formulir.accept');
    Route::get('/admin/payment/formulir/reject/{id}', [AdminController::class, 'paymentFormulirReject'])->name('admin.payment-formulir.reject');
    Route::get('/admin/payment/formulir/pending/{id}', [AdminController::class, 'paymentFormulirPending'])->name('admin.payment-formulir.pending');

    // Payment
    Route::get('/admin/payment/uang_masuk', [AdminController::class, 'paymentUangMasuk'])->name('admin.payment.uang_masuk');

    // anouncement
    Route::get('/admin/anouncement', [AdminController::class, 'anouncement'])->name('admin.anouncement');
});

Route::group(['middleware' => ['auth.check:user']], function () {
    Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');

    // Registration
    Route::get('/user/registration', [UserController::class, 'registration'])->name('user.registration');
    Route::post('/user/registration/store', [UserController::class, 'registrationStore'])->name('user.registration.store');
    Route::post('/user/registration/update', [UserController::class, 'registrationUpdate'])->name('user.registration.update');

    // Parents
    Route::post('/user/parents/store', [UserController::class, 'parentsStore'])->name('user.parents.store');
    Route::post('/user/parents/update', [UserController::class, 'parentsUpdate'])->name('user.parents.update');

    // additionals
    Route::post('/user/additionals/store', [UserController::class, 'additionalsStore'])->name('user.additionals.store');
    Route::post('/user/additionals/update', [UserController::class, 'additionalsUpdate'])->name('user.additionals.update');

    // payment
    Route::post('/user/payment/store', [UserController::class, 'paymentStore'])->name('user.payment.store');
    Route::post('/user/payment/update', [UserController::class, 'paymentUpdate'])->name('user.payment.update');

    // documents
    Route::post('/user/documents/store', [UserController::class, 'documentsStore'])->name('user.documents.store');
    Route::post('/user/documents/update', [UserController::class, 'documentsUpdate'])->name('user.documents.update');

    // pembayaran
    Route::get('/user/pembayaran', [UserController::class, 'pembayaran'])->name('user.pembayaran');

    // kartu ujian
    Route::get('/user/kartu_ujian', [UserController::class, 'kartuUjian'])->name('user.kartu_ujian');


});

