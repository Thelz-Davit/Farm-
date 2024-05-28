<?php

use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\SapiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', function () {
    return view('login');
})->name('login');

Route::get('register', function () {
    return view('register');
});


Route::post('/post-register', [RegisterController::class, 'store']);
Route::post('/post-login', [AuthController::class, 'postLogin']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::middleware(['auth'])->group(function(){
    Route::get('index', function() {
        return view('index');
    });
});

// Route::get('/sapi/table', function () {
//     return view('sapi.table');
// });

// Route::get('/sapi/create', function () {
//     return view('sapi.form');
// });

Route::get('sapi/table', [SapiController::class, 'index']);
Route::get('sapi/create', [SapiController::class, 'create']);
Route::post('sapi/create', [SapiController::class, 'store']);

Route::get('/sapi/edit/{id}', [SapiController::class, 'edit']);
Route::put('/sapi/edit/{id}', [SapiController::class, 'update']);
Route::delete('/sapi/delete/{id}', [SapiController::class, 'destroy']);

Route::get('pemasukan/table', [PengeluaranController::class, 'index']);
Route::get('pengeluaran/table', [PengeluaranController::class, 'index']);
Route::get('pengeluaran/create', [PengeluaranController::class, 'create']);
Route::post('pengeluaran/create', [PengeluaranController::class, 'store']);