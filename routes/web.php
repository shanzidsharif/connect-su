<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;

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
//
//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');

})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//Admin
Route::middleware('auth','role:admin')->group(function (){
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'adminLogout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'adminProfile'])->name('admin.profile');
    Route::post('/admin/profile-update', [AdminController::class, 'adminProfileUpdate'])->name('admin.profile.update');
    Route::get('/admin/profile/password', [AdminController::class, 'adminPassword'])->name('admin.password');
    Route::post('/admin/profile/change-password', [AdminController::class, 'adminChangePassword'])->name('admin.change.password');

});

//End Admin

//Lecturer

Route::middleware('auth','role:lecturer')->group(function (){
    Route::get('/lecturer/dashboard', [LecturerController::class, 'dashboard'])->name('lecturer.dashboard');
});
// End Lecturer

Route::get('/admin/login', [AdminController::class, 'adminLogin'])->name('admin.login');

// Student Controller

// Permission And Controller
Route::controller(RoleController::class)->group(function()){

    Route::get('/all/permission','index')->name('allPermission');
}

