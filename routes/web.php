<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

// Controllers - User (Customer)
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\BookingController;
use App\Http\Controllers\User\RiwayatController;
use App\Http\Controllers\User\UlasanUserController;

// Controllers - Admin
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminBookingController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\ListLayananController;
use App\Http\Controllers\Admin\MetodePembayaranController;
use App\Http\Controllers\Admin\UlasanController;
use App\Http\Controllers\Admin\UserCleanerController;
use App\Http\Controllers\Admin\UserAdminController;
use App\Http\Controllers\Admin\UserCustomerController;
use App\Http\Controllers\Admin\KategoriLayananController;

// Controllers - Pekerja Lapangan
use App\Http\Controllers\Pekerja\LaporanPekerjaanController;
use App\Http\Controllers\Pekerja\PekerjaDashboardController;
use App\Http\Controllers\Pekerja\PekerjaBookingController;

Route::get('/',[UserController::class,'index'])->name('home');
Route::get('/about',[UserController::class,'about'])->name('about');
Route::get('/service',[UserController::class,'service'])->name('service');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// ========================================================
// ROUTE KHUSUS USER / CUSTOMER (Role 3)
// ========================================================
Route::middleware(['auth', 'userMiddleware:3'])->group(function(){
    Route::get('/booking', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('/home', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('/riwayat', [RiwayatController::class, 'index'])->name('riwayat');
    Route::get('/riwayat/{id}', [AdminBookingController::class, 'show'])->name('user.booking.show');

    // Testimoni
    Route::get('/testimoni/tambah/{booking_id}', [UlasanUserController::class, 'create'])->name('testimonial.create');
    Route::post('/testimoni/{booking_id}', [UlasanUserController::class, 'store'])->name('testimonial.store');
    Route::get('/testimoni/edit/{id}/{booking_id}', [UlasanUserController::class, 'edit'])->name('testimonial.edit');
    Route::put('/testimoni/update/{id}/{booking_id}', [UlasanUserController::class, 'update'])->name('testimonial.update');
});

// ========================================================
// ROUTE KHUSUS ADMIN (Role 1)
// ========================================================
Route::middleware(['auth', 'userMiddleware:1'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Kategori Layanan / Service
    Route::get('/admin/service-categories', [KategoriLayananController::class, 'index'])->name('category');
    Route::get('/admin/service-categories/tambah', [KategoriLayananController::class, 'create'])->name('category.create');
    Route::post('/admin/service-categories', [KategoriLayananController::class, 'store'])->name('category.store');
    Route::get('/admin/service-categories/edit/{id}', [KategoriLayananController::class, 'edit'])->name('category.edit');
    Route::put('/admin/service-categories/edit/{id}', [KategoriLayananController::class, 'update'])->name('category.update');
    Route::delete('/admin/service-categories/delete/{id}', [KategoriLayananController::class, 'destroy'])->name('category.destroy');

    // Booking
    Route::get('/admin/booking', [AdminBookingController::class, 'admin'])->name('booking.index');
    Route::put('/admin/booking/tolak/{id}', [AdminBookingController::class, 'tolak'])->name('booking.tolak');
    Route::put('/admin/booking/terima/{id}', [AdminBookingController::class, 'terima'])->name('booking.terima');
    Route::get('/admin/booking/{id}', [AdminBookingController::class, 'show'])->name('booking.show');

    // Tipe / Metode Bayar
    Route::get('/admin/tipe-bayar', [MetodePembayaranController::class, 'index'])->name('type.index');
    Route::get('/admin/tipe-bayar/tambah', [MetodePembayaranController::class, 'create'])->name('type.create');
    Route::post('/admin/tipe-bayar', [MetodePembayaranController::class, 'store'])->name('type.store');
    Route::get('/admin/tipe-bayar/edit/{id}', [MetodePembayaranController::class, 'edit'])->name('type.edit');
    Route::put('/admin/tipe-bayar/update/{id}', [MetodePembayaranController::class, 'update'])->name('type.update');
    Route::delete('/admin/tipe-bayar/delete/{id}', [MetodePembayaranController::class, 'destroy'])->name('type.destroy');

    // Pembayaran
    Route::get('/admin/pembayaran', [PaymentController::class, 'index'])->name('payment.index');
    Route::get('/admin/pembayaran/tambah/{booking_id}', [PaymentController::class, 'create'])->name('payment.create');
    Route::post('/admin/pembayaran/store/{booking_id}', [PaymentController::class, 'store'])->name('payment.store');
    Route::get('/admin/pembayaran/edit/{id}/{booking_id}', [PaymentController::class, 'edit'])->name('payment.edit');
    Route::put('/admin/pembayaran/update/{id}/{booking_id}', [PaymentController::class, 'update'])->name('payment.update');

    // Kelola Admin
    Route::get('/admin/user-admin', [UserAdminController::class, 'index'])->name('user.admin.index');
    Route::get('/admin/user-admin/tambah', [UserAdminController::class, 'create'])->name('user.admin.create');
    Route::post('/admin/user-admin/store', [UserAdminController::class, 'store'])->name('user.admin.store');
    Route::get('/admin/user-admin/edit/{id}', [UserAdminController::class, 'edit'])->name('user.admin.edit');
    Route::put('/admin/user-admin/update/{id}', [UserAdminController::class, 'update'])->name('user.admin.update');
    Route::delete('/admin/user-admin/delete/{id}', [UserAdminController::class, 'destroy'])->name('user.admin.destroy');

    // Kelola Customer
    Route::get('/admin/user-customer', [UserCustomerController::class, 'index'])->name('user.customer.index');
    Route::get('/admin/user-customer/tambah', [UserCustomerController::class, 'create'])->name('user.customer.create');
    Route::post('/admin/user-customer/store', [UserCustomerController::class, 'store'])->name('user.customer.store');
    Route::get('/admin/user-customer/edit/{id}', [UserCustomerController::class, 'edit'])->name('user.customer.edit');
    Route::put('/admin/user-customer/update/{id}', [UserCustomerController::class, 'update'])->name('user.customer.update');
    Route::delete('/admin/user-customer/delete/{id}', [UserCustomerController::class, 'destroy'])->name('user.customer.destroy');

    // Rekap Pekerja
    Route::get('/admin/rekap-teknisi', [UserCleanerController::class, 'rekap'])->name('admin.rekap.teknisi');

    // Kelola Pekerja
    Route::get('/admin/user-teknisi', [UserCleanerController::class, 'index'])->name('user.teknisi.index');
    Route::get('/admin/user-teknisi/tambah', [UserCleanerController::class, 'create'])->name('user.teknisi.create');
    Route::post('/admin/user-teknisi/store', [UserCleanerController::class, 'store'])->name('user.teknisi.store');
    Route::get('/admin/user-teknisi/edit/{id}', [UserCleanerController::class, 'edit'])->name('user.teknisi.edit');
    Route::put('/admin/user-teknisi/update/{id}', [UserCleanerController::class, 'update'])->name('user.teknisi.update');
    Route::delete('/admin/user-teknisi/delete/{id}', [UserCleanerController::class, 'destroy'])->name('user.teknisi.destroy');

    // Testimoni / Ulasan
    Route::get('/admin/testimoni', [UlasanController::class, 'index'])->name('admin.testimonial.index');
    Route::get('/admin/testimoni/edit/{id}', [UlasanController::class, 'edit'])->name('admin.testimonial.edit');
    Route::put('/admin/testimoni/update/{id}', [UlasanController::class, 'update'])->name('admin.testimonial.update');
    Route::delete('/admin/testimoni/delete/{id}', [UlasanController::class, 'destroy'])->name('admin.testimonial.destroy');

    // List Layanan / Service
    Route::get('/admin/list-service', [ListLayananController::class, 'index'])->name('admin.list.index');
    Route::get('/admin/list-service/tambah', [ListLayananController::class, 'create'])->name('admin.list.create');
    Route::post('/admin/list-service', [ListLayananController::class, 'store'])->name('admin.list.store');
    Route::get('/admin/list-service/edit/{id}', [ListLayananController::class, 'edit'])->name('admin.list.edit');
    Route::put('/admin/list-service/edit/{id}', [ListLayananController::class, 'update'])->name('admin.list.update');
    Route::delete('/admin/list-service/delete/{id}', [ListLayananController::class, 'destroy'])->name('admin.list.destroy');
});

// ========================================================
// ROUTE KHUSUS PEKERJA LAPANGAN / CLEANER (Role 2)
// ========================================================
Route::middleware(['auth', 'userMiddleware:2'])->group(function () {
    Route::get('/teknisi/dashboard', [PekerjaDashboardController::class, 'index'])->name('teknisi.dashboard');

    // Booking
    Route::get('/teknisi/booking', [PekerjaBookingController::class, 'index'])->name('teknisi.booking.index');
    Route::put('/teknisi/booking/selesai/{id}', [PekerjaBookingController::class, 'selesai'])->name('booking.selesai');
    Route::get('/teknisi/booking/{id}', [AdminBookingController::class, 'show'])->name('teknisi.booking.show');

    // Laporan Pekerjaan
    Route::get('/teknisi/report', [LaporanPekerjaanController::class, 'index'])->name('report.index');
    Route::get('/teknisi/report/proses/{booking_id}', [LaporanPekerjaanController::class, 'create'])->name('report.create');
    Route::post('/teknisi/report/store/{booking_id}', [LaporanPekerjaanController::class, 'store'])->name('report.store');
    Route::get('/teknisi/report/edit/{id}/{booking_id}', [LaporanPekerjaanController::class, 'edit'])->name('report.edit');
    Route::put('/teknisi/report/update/{id}/{booking_id}', [LaporanPekerjaanController::class, 'update'])->name('report.update');
});
