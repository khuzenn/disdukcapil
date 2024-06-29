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

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard',[AdminController::class,'index'])->name('dashboard');
    Route::get('operator/dashboard',[OperatorController::class,'index']);
    Route::get('/users', [UsersController::class, 'index'])->name('users');
    Route::get('/create-users', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/create-users', [RegisteredUserController::class, 'store']);
    Route::delete('/users/{user}', [UsersController::class, 'destroy'])->name('users.destroy');
    Route::get('/edit', [UsersController::class, 'edit'])->name('edit');
    Route::put('/update', [UsersController::class, 'update'])->name('update');
    
    // Outlet Menu
    Route::get('/data-outlet', [OutletController::class, 'index'])->name('data-outlet');
    Route::get('/create-outlet', [OutletController::class, 'create_outlet'])->name('create-outlet');
    Route::post('/addOutlet', [OutletController::class, 'addOutlet'])->name('addOutlet');
    Route::get('/get-outlet/{id}', [OutletController::class, 'getOutlet'])->name('getOutlet');
    Route::post('/update-outlet/{id}', [OutletController::class, 'updateOutlet'])->name('updateOutlet');
    Route::get('/delete-outlet/{id}', [OutletController::class, 'deleteOutlet'])->name('deleteOutlet');

    // Purpose Menu
    Route::get('/purpose', [PurposeController::class, 'index'])->name('purpose');
    Route::get('/create-purpose', [PurposeController::class, 'create_purpose'])->name('create-purpose');
    Route::post('/addPurpose', [PurposeController::class, 'addPurpose'])->name('addPurpose');
    Route::get('/get-purpose/{id}', [PurposeController::class, 'getPurpose'])->name('getPurpose');
    Route::get('/get-purpose-by-loket/{id}', [PurposeController::class, 'getDataLoket'])->name('getDataLoket');
    Route::post('/update-purpose/{id}', [PurposeController::class, 'updatePurpose'])->name('updatePurpose');
    Route::get('/delete-purpose/{id}', [PurposeController::class, 'deletePurpose'])->name('deletePurpose');

    // Loket Menu
    Route::get('/data-loket', [LoketController::class, 'index'])->name('data-loket');
    Route::get('/create-loket', [LoketController::class, 'create_loket'])->name('create-loket');
    Route::post('/addLoket', [LoketController::class, 'addLoket'])->name('addLoket');
    Route::get('/get-loket/{id}', [LoketController::class, 'getLoket'])->name('getLoket');
    Route::post('/update-loket/{id}', [LoketController::class, 'updateLoket'])->name('updateLoket');
    Route::get('/delete-loket/{id}', [LoketController::class, 'deleteLoket'])->name('deleteLoket');
    Route::get('/user-loket/{id}', [LoketController::class, 'getUserLoket'])->name('getUserLoket');

    // Data Antarmuka
    Route::get('/data-antarmuka', [AntarmukaController::class, 'index'])->name('data-antarmuka');
    Route::get('/create-antarmuka', [AntarmukaController::class, 'create_antarmuka'])->name('create-antarmuka');
    Route::post('/addAntarmuka', [AntarmukaController::class, 'addAntarmuka'])->name('addAntarmuka');
    Route::get('/get-antarmuka/{id}', [AntarmukaController::class, 'getAntarmuka'])->name('getAntarmuka');
    Route::post('/update-antarmuka/{id}', [AntarmukaController::class, 'updateAntarmuka'])->name('updateAntarmuka');
    Route::get('/delete-antarmuka/{id}', [AntarmukaController::class, 'deleteAntarmuka'])->name('deleteAntarmuka');

    // Rincian Loket
    Route::get('/rincian-loket', [RincianLoketController::class, 'index'])->name('rincian-loket');
    Route::get('/display-antrian', [DisplayAntrianController::class, 'index'])->name('display-antrian');
    Route::get('/tabel-antrian-aktif', [RincianLoketController::class, 'antrianAktif'])->name('tabel-antrian-aktif');
    Route::get('/tabel-antrian', [RincianLoketController::class, 'getAntrian'])->name('tabel-antrian');

    // Antrian
    Route::get('/antarmuka-display', [AntrianController::class, 'index'])->name('antarmuka-display');
    Route::post('/create-antrian', [AntrianController::class, 'createAntrian'])->name('create-antrian');
        
});
Route::middleware(['auth','role:operator,admin'])->group(function () {
    Route::get('operator/dashboard',[OperatorController::class,'index'])->name('operator.dashboard');
    Route::get('/antarmuka-display', [AntrianController::class, 'index'])->name('antarmuka-display');
    Route::post('/create-antrian', [AntrianController::class, 'createAntrian'])->name('create-antrian');
    Route::get('/rincian-loket', [RincianLoketController::class, 'index'])->name('rincian-loket');
    Route::get('/display-antrian', [DisplayAntrianController::class, 'index'])->name('display-antrian');
    Route::get('/tabel-antrian-aktif', [AntrianController::class, 'antrianAktif'])->name('getAntrianAktifData');
    Route::get('/tabel-antrian', [AntrianController::class, 'getAntrian'])->name('getAntrianData');
    Route::post('/panggil-antrian', [AntrianController::class, 'panggilAntrian'])->name('panggilAntrian');
    Route::post('/action-panggil', [AntrianController::class, 'actionPanggil'])->name('actionPanggil');
});
