<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedecinController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\RdvController;
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



Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('medecins', MedecinController::class);
Route::get('/allmedecins',[MedecinController::class,'allmedecin']);
Route::get('/rechercher',[MedecinController::class,'rechercher($inputcity)']);
Route::match(['get', 'post'], '/search', [MedecinController::class, 'search'])->name('medecins.search');
Route::resource('rdv',RdvController::class);
Route::match(['get', 'post'],'/confirm', [RdvController::class, 'confirm'])->name('confirm');
Route::get('/rdv/create/{medecin}', [RdvController::class, 'create'])->name('rdv.create');
Route::get('/viewconfirm', [RdvController::class, 'viewconfirm'])->name('viewconfirm');
