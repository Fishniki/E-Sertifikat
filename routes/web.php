<?php

use App\Http\Controllers\admin\DashboardAdmin;
use App\Http\Controllers\admin\LoginAdminController;
use App\Http\Controllers\admin\PesertaController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\user\DashboardUser;
use App\Http\Controllers\user\SertifikatController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//login admin
Route::group(['middleware' => 'admin.guest'], function () {
    Route::get('/admin/login', [LoginAdminController::class, 'index'])->name('admin.login');
    Route::post('/admin/login/store', [LoginAdminController::class, 'loginAdmin'])->name('admin.store');

});
Route::group(['middleware' => 'admin.auth'], function () {
    Route::get('/admin/logout', [LoginAdminController::class, 'logoutAdmin'])->name('admin.logout');

    // routes admin
    Route::get('/admin/dashboard', [DashboardAdmin::class, 'index'])->name('admin.dashboard');

    // tambah peserta
    Route::get('/tambah-peserta', [PesertaController::class, 'index'])->name('tambah.peserta');
    Route::post('/create/peserta', [PesertaController::class, 'store'])->name('create.peserta');

    // edit peserta
    Route::get('/edit-peserta/{id}', [PesertaController::class, 'edit'])->name('edit.peserta');
    Route::post('/edite-peserta/save/{id}', [PesertaController::class, 'savechanges'])->name('edite.peserta');
    //delete peserta
    Route::delete('/delete-peserta/{id}', [PesertaController::class, 'delete'])->name('delete.peserta');

    //tambah ceo/pemberi sertif
    Route::get('/setting-sertifikat', [SettingController::class, 'index'])->name('tambah.setting');
    Route::post('/create/setting', [SettingController::class, 'save'])->name('create.setting');
});


Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [DashboardUser::class, 'index'])->name('home.user');
    
    //form user search sertifikat
    Route::get('/sertifikar-saya', [SertifikatController::class, 'index'])->name('user.sertifikat');
    Route::post('/search-sertifikat', [DashboardUser::class, 'searchSertifikat'])->name('search.sertifikat');
    Route::get('/back/sertifikat',[SertifikatController::class, 'backSertifikat'])->name('back.sertifikat');
});







Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
