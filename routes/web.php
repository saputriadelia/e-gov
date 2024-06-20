<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminBudayaController;
use App\Http\Controllers\AdminPendidikanController;
use App\Http\Controllers\AdminEkonomiController;
use App\Http\Controllers\AdminEGovController;
use App\Http\Controllers\NotificationController;

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
    return view('auth.login');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        $role = auth()->user()->role; // Ambil peran dari user yang sedang login
        
        // Arahkan berdasarkan peran (role)
        switch ($role) {
            case 'admin_budaya':
                return redirect()->route('admin.budaya.index'); // Arahkan ke route untuk admin budaya
                break;
            case 'admin_pendidikan':
                return redirect()->route('admin.pendidikan.index'); // Arahkan ke route untuk admin pendidikan
                break;
            case 'admin_ekonomi':
                return redirect()->route('admin.ekonomi.index'); // Arahkan ke route untuk admin ekonomi
                break;
            case 'admin_egov':
                return redirect()->route('admin.egov.notifications.index'); // Arahkan ke route untuk admin egov
                break;
            default:
                abort(403); // Jika peran tidak sesuai, berikan akses terlarang (forbidden)
                break;
        }
    })->name('dashboard');


// Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// terakhir faris malam 1.34 AM
Route::middleware(['auth', 'role:admin_budaya'])->group(function () {
    Route::get('/admin-budaya', [AdminBudayaController::class, 'index'])->name('admin.budaya.index');
    Route::get('/admin-budaya/create', [AdminBudayaController::class, 'create'])->name('admin.budaya.create');
    Route::post('/admin-budaya', [AdminBudayaController::class, 'store'])->name('admin.budaya.store');
    Route::get('/admin-budaya/{id}/edit', [AdminBudayaController::class, 'edit'])->name('admin.budaya.edit');
    Route::put('/admin-budaya/{id}', [AdminBudayaController::class, 'update'])->name('admin.budaya.update');
    Route::delete('/admin-budaya/{id}', [AdminBudayaController::class, 'destroy'])->name('admin.budaya.destroy');
    Route::post('/admin-budaya/send-notification/{id}', [AdminBudayaController::class, 'sendNotification'])->name('admin.budaya.sendNotification');
});


Route::middleware(['auth', 'role:admin_pendidikan'])->group(function () {
    Route::get('/admin-pendidikan', [AdminPendidikanController::class, 'index'])->name('admin.pendidikan.index');
    Route::get('/admin-pendidikan/create', [AdminPendidikanController::class, 'create'])->name('admin.pendidikan.create');
    Route::post('/admin-pendidikan', [AdminPendidikanController::class, 'store'])->name('admin.pendidikan.store');
    Route::get('/admin-pendidikan/{id}/edit', [AdminPendidikanController::class, 'edit'])->name('admin.pendidikan.edit');
    Route::put('/admin-pendidikan/{id}', [AdminPendidikanController::class, 'update'])->name('admin.pendidikan.update');
    Route::delete('/admin-pendidikan/{id}', [AdminPendidikanController::class, 'destroy'])->name('admin.pendidikan.destroy');
    Route::post('/admin-pendidikan/send-notification/{id}', [AdminPendidikanController::class, 'sendNotification'])->name('admin.pendidikan.sendNotification');
});

Route::middleware(['auth', 'role:admin_ekonomi'])->group(function () {
    Route::get('/admin-ekonomi', [AdminEkonomiController::class, 'index'])->name('admin.ekonomi.index');
    Route::get('/admin-ekonomi/create', [AdminEkonomiController::class, 'create'])->name('admin.ekonomi.create');
    Route::post('/admin-ekonomi', [AdminEkonomiController::class, 'store'])->name('admin.ekonomi.store');
    Route::get('/admin-ekonomi/{id}/edit', [AdminEkonomiController::class, 'edit'])->name('admin.ekonomi.edit');
    Route::put('/admin-ekonomi/{id}', [AdminEkonomiController::class, 'update'])->name('admin.ekonomi.update');
    Route::delete('/admin-ekonomi/{id}', [AdminEkonomiController::class, 'destroy'])->name('admin.ekonomi.destroy');
    Route::post('/admin-ekonomi/send-notification/{id}', [AdminEkonomiController::class, 'sendNotification'])->name('admin.ekonomi.sendNotification');
});

Route::middleware(['auth', 'role:admin_egov'])->prefix('admin-egov')->group(function () {
    Route::get('/admin-egov/notifications/{title?}', [NotificationController::class, 'index'])
    ->name('admin.egov.notifications.index');
    Route::post('/notifications/accept/{id}', [NotificationController::class, 'accept'])->name('admin.egov.notifications.accept');
    Route::get('/ekonomi', [NotificationController::class, 'ekonomi'])->name('ekonomi');
    Route::get('/notifications/decline/{id}', [NotificationController::class, 'showDeclineForm'])->name('admin.egov.notifications.declineForm');
    Route::post('/notifications/decline/{id}', [NotificationController::class, 'decline'])->name('admin.egov.notifications.decline');
});

Route::middleware('auth')->group(function () {
    Route::get('/notifications/mark-as-read/{id}', [NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');
});


// web.php
Route::get('/notifications/mark-as-read/{id}', [NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');
// Route::get('/dashboard', [NotificationController::class, 'index'])->name('dashboard');
Route::post('/admin/ekonomi/send-to-egov/{id}', [AdminEkonomiController::class, 'sendToAdminEgov'])->name('admin.ekonomi.sendToAdminEgov');


// Masyarakat Budaya
Route::get('/budaya', [NotificationController::class, 'budaya'])->name('budaya.index');
Route::get('/', function () {
    return view('MADARA.index');
});

// Madara Dashboard
Route::get('/login-madara', function () {
    return view('MADARA.login');
});
Route::get('/feedback-madara', function () {
    return view('MADARA.feedback');
});
Route::get('/feedback2-madara', function () {
    return view('MADARA.feedback2');
});
Route::get('/pendidikan-madara', function () {
    return view('MADARA.masyarakat-pendidikan.pendidikan');
});
Route::get('/ekonomi-madara', function () {
    return view('MADARA.masyarakat-ekonomi.ekonomi');
});
Route::get('/budaya-madara', function () {
    return view('MADARA.masyarakat-budaya.budaya');
});


// Ekonomi Madara
Route::get('/berasdetail', function () {
    return view('MADARA.masyarakat-ekonomi.berasdetail');
});
Route::get('/telurayam', function () {
    return view('MADARA.masyarakat-ekonomi.telurayam');
});
Route::get('/dagingayam', function () {
    return view('MADARA.masyarakat-ekonomi.dagingayam');
});
Route::get('/dagingsapi', function () {
    return view('MADARA.masyarakat-ekonomi.dagingsapi');
});
Route::get('/bawangmerah', function () {
    return view('MADARA.masyarakat-ekonomi.bawangmerah');
});
Route::get('/bawangputih', function () {
    return view('MADARA.masyarakat-ekonomi.bawangputih');
});
Route::get('/cabe', function () {
    return view('MADARA.masyarakat-ekonomi.cabe');
});
Route::get('/tomat', function () {
    return view('MADARA.masyarakat-ekonomi.tomat');
});

// pendidikan 
Route::get('/jumlahguru', function () {
    return view('MADARA.masyarakat-pendidikan.jumlahguru');
});
Route::get('/slb', function () {
    return view('MADARA.masyarakat-pendidikan.slb');
});
Route::get('/jumsel', function () {
    return view('MADARA.masyarakat-pendidikan.jumsel');
});
Route::get('/partisipasisekolah', function () {
    return view('MADARA.masyarakat-pendidikan.partisipasisekolah');
});
require __DIR__.'/auth.php';

