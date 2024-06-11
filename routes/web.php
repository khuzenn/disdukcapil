<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OutletController;


Route::get('/', function () {
    return view('dashboard');
});

Route::get('/data-pengguna', function () {
    return view('data_pengguna');
});

Route::get('/data-outlet', [OutletController::class, 'index'])->name('data-outlet');

Route::get('/create-outlet', [OutletController::class, 'create_outlet'])->name('create-outlet');
Route::post('/addOutlet', [OutletController::class, 'addOutlet'])->name('addOutlet');
Route::get('/getOutlet/{id}', [OutletController::class, 'getOutlet'])->name('getOutlet');

Route::get('/purpose', function () {
    return view('settings/purpose');
});

Route::get('/loket', function () {
    return view('settings/loket');
});

Route::get('/display', function () {
    return view('settings/display');
});