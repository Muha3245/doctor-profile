<?php

use App\Http\Controllers\MenuController;
use App\Http\Controllers\SubMenuController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\IconBoxController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\Auth\TwoFactorController;
use App\Http\Controllers\Navcontroller;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\Auth\GoogleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
// use Auth;
/*
|----------------------------------------------------------------------
| Web Routes
|----------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});



// Route::get('/navbar', [Navcontroller::class, 'index'])->name('navbar.index');


// Route::get('show',[MenuController::class,'show'])->name('show');
Route::prefix('admin')->middleware(['roles:1'])->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    });
    // Route::post('/2fa', function () {
    //     return redirect(route('dashboard'));
    // })->name('2fa');
    // Admin-only routes
    Route::resource('menu', MenuController::class);
    Route::resource('gallery', GalleryController::class);
    Route::delete('gallery/{gallery}/image/{index}', [GalleryController::class, 'destroyImage'])->name('gallery.image.destroy');


    Route::resource('submenu', SubMenuController::class);
    // Route::patch('submenu/{submenu}/toggle-status', [SubMenuController::class, 'toggleStatus'])->name('submenu.toggleStatus');
    // Route::patch('menu/{menu}/toggle-status', [MenuController::class, 'toggleStatus'])->name('menu.toggleStatus');

    Route::resource('abouts', AboutController::class);
    Route::resource('iconboxes', IconBoxController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('departments', DepartmentController::class);

    Route::get('index',[DoctorController::class, 'index'])->name('doctors.index');
    Route::get('create',[DoctorController::class, 'create'])->name('doctors.create');
    Route::get('/edit/{id}',[DoctorController::class, 'edit'])->name('doctors.edit');
    Route::post('store',[DoctorController::class, 'store'])->name('doctors.store');
    Route::put('/update/{id}',[DoctorController::class, 'update'])->name('doctors.update');
    Route::delete('destory/{id}',[DoctorController::class, 'destroy'])->name('doctors.destroy');
    Route::resource('appointments', AppointmentController::class);
//     Route::post('/appointments/{appointment}/accept', [AppointmentController::class, 'accept'])->name('appointments.accept');
// Route::delete('/appointments/{appointment}/cancel', [AppointmentController::class, 'cancel'])->name('appointments.cancel');
Route::put('/appointments/{appointment}', [AppointmentController::class, 'updateStatus']);
Route::post('/appointments/{appointment}', [AppointmentController::class, 'cancel']);

    Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');

});

Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');



Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
Route::get('/2fa', [TwoFactorController::class, 'show'])->name('2fa');
Route::post('/2fa', [TwoFactorController::class,'verify'])->name('2fa.verify');


Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::middleware(['2fa'])->group(function () {

    // Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::post('/2fa', function () {
        return redirect(route('admin/dashboard'));
    })->name('2fa');

});
Route::get('/complete-registration', [AuthController::class, 'QRRegister'])->name('complete.registration');
Route::get('/RegisterForm',[AuthController::class, 'RegisterForm']);



