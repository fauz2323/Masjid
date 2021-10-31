<?php

use App\Http\Controllers\Web\KultumController;
use App\Http\Controllers\Web\PemasukanController;
use App\Http\Controllers\Web\PengajianCntroller;
use App\Http\Controllers\Web\PengeluaranController;
use App\Http\Controllers\Web\ShlatJumatController;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('kultum',[KultumController::class, 'index'])->name('kultum-index');
Route::get('kultum/{id}/edit',[KultumController::class,'updateview'])->name('kultum-edit');
Route::post('kultumStore',[KultumController::class,'store'])->name('kultum-stre');
Route::get('kultumDelete/{id}',[KultumController::class,'delete'])->name('kultum-delete');
Route::post('editStore/{id}',[KultumController::class, 'updateStore'])->name('update-kultum');

Route::get('pemasukan',[PemasukanController::class, 'index'])->name('pemasukan-index');
Route::get('pemasukan/{id}/edit',[PemasukanController::class,'updateview'])->name('pemasukan-edit');
Route::post('pemasukanStore',[PemasukanController::class,'store'])->name('pemasukan-stre');
Route::get('pemasukanDelete/{id}',[PemasukanController::class,'delete'])->name('pemasukan-delete');
Route::post('pemasukanEdit/{id}',[PemasukanController::class, 'updateStore'])->name('update-pemasukan');

Route::get('pengajian',[PengajianCntroller::class, 'index'])->name('pengajian-index');
Route::get('pengajian/{id}/edit',[PengajianCntroller::class,'updateview'])->name('pengajian-edit');
Route::post('pengajianStore',[PengajianCntroller::class,'store'])->name('pengajian-stre');
Route::get('pengajianDelete/{id}',[PengajianCntroller::class,'delete'])->name('pengajian-delete');
Route::post('pengajianEdit/{id}',[PengajianCntroller::class, 'updateStore'])->name('update-pengajian');

Route::get('pengeluaran',[PengeluaranController::class, 'index'])->name('pengeluaran-index');
Route::get('pengeluaran/{id}/edit',[PengeluaranController::class,'updateview'])->name('pengeluaran-edit');
Route::post('pengeluaranStore',[PengeluaranController::class,'store'])->name('pengeluaran-stre');
Route::get('pengeluaranDelete/{id}',[PengeluaranController::class,'delete'])->name('pengeluaran-delete');
Route::post('pengeluaranEdit/{id}',[PengeluaranController::class, 'updateStore'])->name('update-pengeluaran');

Route::get('sholatJumat',[ShlatJumatController::class, 'index'])->name('sholatJumat-index');
Route::get('sholatJumat/{id}/edit',[ShlatJumatController::class,'updateview'])->name('sholatJumat-edit');
Route::post('sholatJumatStore',[ShlatJumatController::class,'store'])->name('sholatJumat-stre');
Route::get('sholatJumatDelete/{id}',[ShlatJumatController::class,'delete'])->name('sholatJumat-delete');
Route::post('sholatJumatEdit/{id}',[ShlatJumatController::class, 'updateStore'])->name('update-sholatJumat');


Route::middleware(['role:admin', 'role:staff'])->group(function () {

});
