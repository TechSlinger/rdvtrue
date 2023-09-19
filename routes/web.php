<?php

use App\Http\Controllers\DoctorAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedecinController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
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
Route::resource('medecins', MedecinController::class)->only(['index'])->middleware('isadmin');
Route::get('/doctors',[MedecinController::class,'doctors'])->name('doctors');
Route::get('/confirmadd',[MedecinController::class, 'confirm_add'])->name('confirmadd');
Route::match(['get', 'post'],'/adddoctor', [MedecinController::class,'create'])->name('adddoctor');

Route::get('/rechercher',[MedecinController::class,'rechercher($inputcity)']);
Route::match(['get', 'post'], '/search', [MedecinController::class, 'search'])->name('medecins.search');
Route::resource('rdv',RdvController::class);
Route::get('/rdv/create/{medecin}', [RdvController::class, 'create'])->name('rdv.create');
Route::get('/view_rdv_info', [RdvController::class, 'view_rdv_info'])->name('view_rdv_info');
Route::get('/appointments',[MedecinController::class,'showAppointments']);
Route::prefix('doctor')->group(function () {
    Route::get('login', [DoctorAuthController::class,'showLoginForm'])->name('doctor.login');
    Route::post('login', [DoctorAuthController::class,'login'])->name('doctor.login.submit');
    Route::get('register', [DoctorAuthController::class,'showRegistrationForm'])->name('doctor.register');
    Route::post('register',  [DoctorAuthController::class,'register'])->name('doctor.register.submit');
    // ... other doctor-specific routes
});
// routes/web.php
Route::get('/medecin/logout', [DoctorAuthController::class, 'logout'])->name('medecin.logout');
Route::middleware('isdoctor')->get('/dashboard', [RdvController::class,'dashboard'])->name('doctor.dashboard');
Route::post('/feedback',[HomeController::class,'submitFeedback'])->name('submit.feedback');
Route::get('/allfeedback',[HomeController::class,'all_feedback'])->name('feedback');
Route::delete('/destroy/{rdv}', [RdvController::class, 'destroy'])->name('rdv.destroy');
