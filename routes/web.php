<?php

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

use App\Http\Controllers\TestTakerController;
use App\Http\Controllers\UploadController;

// test taker routes
Route::get('/', [TestTakerController::class, 'index']);

Route::get('/show', [TestTakerController::class, 'getTestTakers']);

Route::get('/diagram', [TestTakerController::class, 'diagram_view']);

Route::post('/save', [TestTakerController::class, 'save']);

Route::post('/delete', [TestTakerController::class, 'delete']);

Route::post('/update', [TestTakerController::class, 'update']);

// upload routes
Route::get('/upload', [UploadController::class, 'index']);

Route::post('/upload-csv', [UploadController::class, 'storeCSV'])->name('upload.store');

// removable
Route::get('/lore', [TestTakerController::class, 'lore']);
