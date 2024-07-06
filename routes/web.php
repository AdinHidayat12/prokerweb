<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authentication;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\OfficialsController;
use App\Http\Controllers\CouncilController;
use App\Http\Controllers\GovController;
use App\Http\Controllers\InfController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\UnionController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\ProfessionController;
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
Route::get('/', [HomeController::class, 'index']);
Route::get('/masuk', [Authentication::class, 'index'])->name('login')->middleware('guest');
Route::post('/masuk', [Authentication::class, 'login'])->middleware('guest');
Route::post('/keluar', [Authentication::class, 'logout'])->middleware('auth');
Route::get('/artikel', [HomeController::class, 'list_artikel']);
Route::get('/artikel/{artikel}', [HomeController::class, 'show_artikel']);
Route::get('/pemerintahan/visimisi', [HomeController::class, 'show_visi_misi']);
Route::get('/pemerintahan/struktur', [HomeController::class, 'show_struktur']);
Route::get('/pemerintahan/bpd', [HomeController::class, 'show_bpd']);
Route::get('/desa/geografi', [HomeController::class, 'show_geografi']);
Route::get('/desa/sarana', [HomeController::class, 'show_sarana']);
Route::get('/kelembagaan/{lembaga}', [HomeController::class, 'show_lembaga']);
Route::get('/data', [HomeController::class, 'show_data']);

Route::resource('/admin/article', ArticleController::class)->middleware('auth');
Route::resource('/admin/pegawai', OfficialsController::class)->except(['index', 'show'])->middleware('auth');
Route::resource('/admin/bpd', CouncilController::class)->except(['index', 'show'])->middleware('auth');
Route::resource('/admin/infrastruktur', InfController::class)->except(['index', 'show'])->middleware('auth');
Route::resource('/admin/foto', PhotoController::class)->except(['index', 'show'])->middleware('auth');
Route::resource('/admin/data_umum', GeneralController::class)->except(['index', 'show'])->middleware('auth');
Route::resource('/admin/data_profesi', ProfessionController::class)->except(['index', 'show'])->middleware('auth');
Route::resource('/admin/kelembagaan', UnionController::class)->middleware('auth');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/admin/pemerintahan', [GovController::class, 'index'])->middleware('auth');
Route::put('/admin/pemerintahan', [GovController::class, 'ubah_visi'])->middleware('auth');
Route::get('/admin/profil_desa/', [GovController::class, 'show_profil'])->middleware('auth');
Route::put('/admin/profil_desa/geografis', [GovController::class, 'ubah_geografis'])->middleware('auth');
Route::put('/admin/profil_desa/ekonomi', [GovController::class, 'ubah_ekonomi'])->middleware('auth');
Route::get('/admin/data_desa', [GovController::class, 'show_data'])->middleware('auth');