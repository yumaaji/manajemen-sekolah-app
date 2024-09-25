<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\DashboardController;

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


Route::get('/', function (){
  return redirect('/login');
});
Route::get('/lorem', function (){
  return view('404');
});

Route::get('/login', [AuthController::class, 'showLogin'])->middleware('operator.guest')->name('login');
Route::post('/login', [AuthController::class, 'checkLogin'])->middleware('operator.guest')->name('login.check');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('operator.auth')->group(function (){
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    // Operator
    Route::resource('/dataoperator', OperatorController::class);
    Route::get('/dataoperator/{id}/get-status', [OperatorController::class, 'getStatus'])->name('dataoperator.getstatus');
    Route::put('/dataoperator/{id}/set-status', [OperatorController::class, 'updateStatus'])->name('dataoperator.setstatus');
    // Guru
    Route::resource('/dataguru', GuruController::class);
    // Mapel
    Route::resource('/datamapel', MapelController::class);
});
