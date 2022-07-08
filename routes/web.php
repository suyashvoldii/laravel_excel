<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersExportController;
use App\Http\Controllers\UsersImportController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users/export', [UsersExportController::class, 'export']);

Route::get('/users/import', [UsersImportController::class, 'show']);

Route::post('/users/import', [UsersImportController::class, 'store']);