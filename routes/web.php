<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LoginController::class, 'index']);
Route::get('/register', [LoginController::class, 'register']);
Route::post('/register', [LoginController::class, 'store']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/datausers', [LoginController::class, 'datausers']);
Route::get('/tambahusers', [LoginController::class, 'tambahUsers']);
Route::post('/storeuser', [LoginController::class, 'storeuser']);
Route::post('/deleteuser/{id}', [LoginController::class, 'deleteuser']);

Route::get('/dataobat', [ObatController::class, 'dataobat']);
Route::get('/tambahobat', [ObatController::class, 'tambahobat']);
Route::post('/tambahobat', [ObatController::class, 'storeobat']);
Route::get('/editobat/{id}', [ObatController::class, 'editobat']);
Route::post('/updateobat/{id}', [ObatController::class, 'updateobat']);
Route::post('/delete/{id}', [ObatController::class, 'deleteObat']);





