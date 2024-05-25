<?php

use App\Http\Controllers\ClusterController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\KmeansController;
use App\Http\Controllers\PerhitunganController;
use App\Http\Controllers\VariabelController;
use App\Models\Cluster;
use App\Models\Data;
use Illuminate\Support\Facades\Route;

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
    return view ('dasboard/dasboard', [
        "title" => "Dashboard"
    ]);
});

Route::get('/variabel',  [VariabelController::class, 'index']);

Route::get('/variabel/tambah', [VariabelController::class, 'tambah']);

Route::post('/variabel/simpan', [VariabelController::class, 'simpan']);

Route::get('/variabel/edit/{id}', [VariabelController::class, 'edit']);

Route::put('/variabel/update/{id}', [VariabelController::class, 'update']);

Route::get('/variabel/delete/{id}', [VariabelController::class, 'destroy']);



Route::get('/data',  [DataController::class, 'index']);

Route::get('/data/tambah', [DataController::class, 'tambah']);

Route::post('/data/simpan', [DataController::class, 'simpan']);

Route::get('/data/edit/{id}', [DataController::class, 'edit']);

Route::put('/data/update/{id}', [DataController::class, 'update']);

Route::get('/data/delete/{id}', [DataController::class, 'destroy']);

Route::get('/data/delete-all', [DataController::class, 'destroyAll']);

Route::post('/data/import', [DataController::class, 'import']);



Route::get('/cluster',  [ClusterController::class, 'index']);

Route::get('/cluster/tambah', [ClusterController::class, 'tambah']);

Route::get('/cluster/pusatawal/{id}', [ClusterController::class, 'pusatawal']);

// Route::get('/cluster/pusatawal/cari', [ClusterController::class, 'caripusatawal']);

Route::put('/cluster/pusatawal/set/{id}', [ClusterController::class, 'setPusatAwal']);

Route::post('/cluster/simpan', [ClusterController::class, 'simpan']);

Route::get('/cluster/edit/{id}', [ClusterController::class, 'edit']);

Route::put('/cluster/update/{id}', [ClusterController::class, 'update']);

Route::get('/cluster/delete/{id}', [ClusterController::class, 'destroy']);


Route::get('/kmeans', [KmeansController::class, 'kmeans']);