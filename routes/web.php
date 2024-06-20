<?php

use App\Http\Controllers\AdminPanel\AdminController;
use App\Http\Controllers\OperatorPanel\OperatorController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\PurposeController;
use App\Http\Controllers\LoketController;
use App\Http\Controllers\AntarmukaController;
use App\Http\Controllers\RincianLoketController;
use App\Http\Controllers\DisplayAntrianController;
use App\Http\Controllers\AntrianController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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

Route::get('/', function () {
    return redirect('/login');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth','role:admin'])->group(function () {
    Route::get('admin/dashboard',[AdminController::class,'index'])->name('admin.dashboard');
    Route::get('operator/dashboard',[OperatorController::class,'index']);
    Route::get('admin/users', [UsersController::class, 'index'])->name('users');
    Route::get('admin/create-users', [RegisteredUserController::class, 'create'])
    ->name('admin.register');
    Route::post('admin/create-users', [RegisteredUserController::class, 'store']);
    Route::delete('/users/{user}', [UsersController::class, 'destroy'])->name('users.destroy');
    
    // Outlet Menu
    Route::get('admin/data-outlet', [OutletController::class, 'index'])->name('data-outlet');
    Route::get('admin/create-outlet', [OutletController::class, 'create_outlet'])->name('create-outlet');
    Route::post('admin/addOutlet', [OutletController::class, 'addOutlet'])->name('addOutlet');
    Route::get('admin/get-outlet/{id}', [OutletController::class, 'getOutlet'])->name('getOutlet');
    Route::post('admin/update-outlet/{id}', [OutletController::class, 'updateOutlet'])->name('updateOutlet');
    Route::get('admin/delete-outlet/{id}', [OutletController::class, 'deleteOutlet'])->name('deleteOutlet');

    // Purpose Menu
    Route::get('admin/purpose', [PurposeController::class, 'index'])->name('purpose');
    Route::get('admin/create-purpose', [PurposeController::class, 'create_purpose'])->name('create-purpose');
    Route::post('admin/addPurpose', [PurposeController::class, 'addPurpose'])->name('addPurpose');
    Route::get('admin/get-purpose/{id}', [PurposeController::class, 'getPurpose'])->name('getPurpose');
    Route::get('admin/get-purpose-by-loket/{id}', [PurposeController::class, 'getDataLoket'])->name('getDataLoket');
    Route::post('admin/update-purpose/{id}', [PurposeController::class, 'updatePurpose'])->name('updatePurpose');
    Route::get('admin/delete-purpose/{id}', [PurposeController::class, 'deletePurpose'])->name('deletePurpose');

    // Loket Menu
    Route::get('admin/data-loket', [LoketController::class, 'index'])->name('data-loket');
    Route::get('admin/create-loket', [LoketController::class, 'create_loket'])->name('create-loket');
    Route::post('admin/addLoket', [LoketController::class, 'addLoket'])->name('addLoket');
    Route::get('admin/get-loket/{id}', [LoketController::class, 'getLoket'])->name('getLoket');
    Route::post('admin/update-loket/{id}', [LoketController::class, 'updateLoket'])->name('updateLoket');
    Route::get('admin/delete-loket/{id}', [LoketController::class, 'deleteLoket'])->name('deleteLoket');

    // Data Antarmuka
    Route::get('admin/data-antarmuka', [AntarmukaController::class, 'index'])->name('data-antarmuka');
    Route::get('admin/create-antarmuka', [AntarmukaController::class, 'create_antarmuka'])->name('create-antarmuka');
    Route::post('admin/addAntarmuka', [AntarmukaController::class, 'addAntarmuka'])->name('addAntarmuka');
    Route::get('admin/get-antarmuka/{id}', [AntarmukaController::class, 'getAntarmuka'])->name('getAntarmuka');
    Route::post('admin/update-antarmuka/{id}', [AntarmukaController::class, 'updateAntarmuka'])->name('updateAntarmuka');
    Route::get('admin/delete-antarmuka/{id}', [AntarmukaController::class, 'deleteAntarmuka'])->name('deleteAntarmuka');

    // Rincian Loket
    Route::get('admin/rincian-loket', [RincianLoketController::class, 'index'])->name('rincian-loket');
    Route::get('admin/display-antrian', [DisplayAntrianController::class, 'index'])->name('display-antrian');
    Route::get('admin/tabel-antrian-aktif', [RincianLoketController::class, 'antrianAktif'])->name('tabel-antrian-aktif');
    Route::get('admin/tabel-antrian', [RincianLoketController::class, 'getAntrian'])->name('tabel-antrian');

    // Antrian
    Route::get('admin/antarmuka-display', [AntrianController::class, 'index'])->name('antarmuka-display');
    Route::post('admin/create-antrian', [AntrianController::class, 'createAntrian'])->name('create-antrian');
    
});
Route::middleware(['auth','role:operator'])->group(function () {
    Route::get('operator/dashboard',[OperatorController::class,'index'])->name('operator.dashboard');
});
