<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\PurposeController;
use App\Http\Controllers\LoketController;
use App\Http\Controllers\AntarmukaController;


Route::get('/', function () {
    return view('dashboard');
});

Route::get('/data-pengguna', function () {
    return view('data_pengguna');
});

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

// Data Antarmuka
Route::get('/data-antarmuka', [AntarmukaController::class, 'index'])->name('data-antarmuka');
Route::get('/create-antarmuka', [AntarmukaController::class, 'create_antarmuka'])->name('create-antarmuka');
Route::post('/addAntarmuka', [AntarmukaController::class, 'addAntarmuka'])->name('addAntarmuka');
Route::get('/get-antarmuka/{id}', [AntarmukaController::class, 'getAntarmuka'])->name('getAntarmuka');
Route::post('/update-antarmuka/{id}', [AntarmukaController::class, 'updateAntarmuka'])->name('updateAntarmuka');
Route::get('/delete-antarmuka/{id}', [AntarmukaController::class, 'deleteAntarmuka'])->name('deleteAntarmuka');