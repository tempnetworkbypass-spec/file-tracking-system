<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\FileRecordController;
use App\Http\Controllers\FileTransferController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\TransferApprovalController;

// ADMIN CONTROLLERS (IMPORT THESE)
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminFileController;
use App\Http\Controllers\Admin\AdminDesignationController;

/*
|--------------------------------------------------------------------------
| PUBLIC
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| AUTH USERS (COMMON)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('files', FileRecordController::class);
    Route::post('/file-transfer', [FileTransferController::class, 'store'])->name('files.transfer');
});

/*
|--------------------------------------------------------------------------
| SUPER ADMIN ONLY
|--------------------------------------------------------------------------
*/
// SUPER ADMIN ONLY
Route::middleware(['auth', 'super_admin'])->group(function () {
    Route::resource('departments', DepartmentController::class);
});

// SUPER ADMIN + ADMIN
Route::middleware(['auth', 'role:super_admin,admin'])->group(function () {
    Route::resource('designations', DesignationController::class);
});
/*
|--------------------------------------------------------------------------
| ADMIN MODULE
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {

    Route::get('/dashboard', [AdminDashboardController::class, 'index'])
        ->name('admin.dashboard');

    Route::resource('users', AdminUserController::class);
    Route::resource('designations', AdminDesignationController::class);
    Route::get('/files', [AdminFileController::class, 'index'])
        ->name('admin.files');
});

/*
|--------------------------------------------------------------------------
| SHARED (Super Admin + Admin)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:super_admin,admin'])->group(function () {
    Route::resource('users', UserController::class);
});

Route::prefix('admin')->middleware('role:admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
});

// Route::middleware(['auth'])->group(function () {
//     Route::get('/file-transfer/{file}', [FileTransferController::class, 'create'])
//         ->name('file-transfer.create');

//     Route::post('/file-transfer', [FileTransferController::class, 'store'])
//         ->name('file-transfer.store');
// });


Route::middleware('auth')->group(function () {

    Route::get(
        '/files/{file}/transfer',
        [FileTransferController::class, 'create']
    )->name('files.transfer.create');

    Route::post(
        '/files/transfer',
        [FileTransferController::class, 'store']
    )->name('files.transfer.store');
});

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->group(function () {

        Route::get(
            '/transfer-requests',
            [TransferApprovalController::class, 'index']
        )->name('transfer.requests');

        Route::post(
            '/transfer-requests/{id}/approve',
            [TransferApprovalController::class, 'approve']
        )->name('transfer.approve');

        Route::post(
            '/transfer-requests/{id}/reject',
            [TransferApprovalController::class, 'reject']
        )->name('transfer.reject');
    });

/*
|--------------------------------------------------------------------------
| FILE TRANSFER
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get(
        '/files/{file}/transfer',
        [FileTransferController::class, 'create']
    )->name('files.transfer.create');

    Route::post(
        '/files/transfer',
        [FileTransferController::class, 'store']
    )->name('files.transfer.store');
});

/*
|--------------------------------------------------------------------------
| TRANSFER APPROVAL (ADMIN)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->group(function () {

        Route::get(
            '/transfer-requests',
            [TransferApprovalController::class, 'index']
        )->name('transfer.requests');

        Route::post(
            '/transfer-requests/{id}/approve',
            [TransferApprovalController::class, 'approve']
        )->name('transfer.approve');

        Route::post(
            '/transfer-requests/{id}/reject',
            [TransferApprovalController::class, 'reject']
        )->name('transfer.reject');
    });

/*
|--------------------------------------------------------------------------
| LOGOUT
|--------------------------------------------------------------------------
*/

Route::post('/logout', function () {
    Auth::logout();

    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/');
})->name('logout');

require __DIR__ . '/auth.php';
