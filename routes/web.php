<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\RiwayattransaksiController;

Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return redirect()->route('login');
    });
    //Login
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticating']);
});

//ADMIN
Route::middleware(['auth'])->group(function () {
    // LOGOUT
    Route::get('/logout', [AuthController::class, 'logout']);
    // DASHBOARD
    Route::get('/dashboard', [DashboardController::class, 'index']);
    // DATA MEMBER
    Route::get('/datamember', [MemberController::class, 'index'])->name('datamember.index');
    Route::get('/datamember-show/{id}', [MemberController::class, 'show'])->name('datamember.show');
    Route::post('/datamember-add', [MemberController::class, 'store'])->name('datamember.store');
    Route::get('/datamember-edit/{id}', [MemberController::class, 'edit']);
    Route::post('/datamember-edit/{id}', [MemberController::class, 'update']);
    Route::get('/datamember-destroy/{id}', [MemberController::class, 'destroy']);
    // TRANSAKSI
    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
    Route::post('/transaksi-add', [TransaksiController::class, 'store'])->name('transaksi.store');
    Route::get('/transaksi/print', [TransaksiController::class, 'print'])->name('transaksi.print');
    // USER
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::post('/user-add', [UserController::class, 'store'])->name('user.store');
    Route::get('/user-edit/{id}', [UserController::class, 'edit']);
    Route::post('/user-edit/{id}', [UserController::class, 'update']);
    Route::get('/user-destroy/{id}', [UserController::class, 'destroy']);
    Route::get('/user-show/{id}', [UserController::class, 'show'])->name('user.show');
});
