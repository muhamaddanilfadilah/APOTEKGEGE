<?php

use Illuminate\Support\Facades\Route;
// use : Import file : namespace\namaclass
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\OrderController;


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

//struktur routing laravel:
// route ::httpMethod('/nama-path', [NamaController::class, 'namaFunc'])->name ('identitas_route');
// http Method:
// 1. get -> mengambil data/menampilkan halaman
// 2.post -> menambahkan data baru ke db
// 3.patch/put -> mengubah data di db
// 4. delate -> menghapus data di db

// Route::middleware('IsLogin')->group(function() {
//     Route::get('/home', function () {
//         return view('home');
//     })->name('home.page');
// });
Route::middleware(['isGuest'])->group(function () {
    // Route::get('/', [UserController::class, 'login'])->name('login');
    // Route::post('/login', [UserController::class, 'loginAuth'])->name('login.auth');
    Route::get('/', [AkunController::class, 'login'])->name('login');
    Route::post('/login', [AkunController::class, 'loginAuth'])->name('login.auth');
});

// Route::get('/', [AkunController::class, 'login'])->name('login');
// Route::post('/login', [AkunController::class, 'loginAuth'])->name('login.auth');


Route::middleware(['IsLogin'])->group(function () {
    Route::post('/logout', [AkunController::class, 'logout'])->name('logout');
    Route::get('/home', function () {
        return view('home');
    })->name('home.page');

    Route::get('/pembelian', [OrderController::class, 'index'])->name('pembelian');
    Route::get('/pembelian/create', [OrderController::class, 'create'])->name('tambah.pembelian');
    Route::post('/pembelian/store', [OrderController::class, 'store'])->name('pembelian.store');
    Route::get('/print/{id}', [OrderController::class, 'show'])->name('print');


    Route::middleware(['isAdmin'])->group(function () {
        Route::prefix('/users')->name('users.')->group(function () {});

        Route::prefix('/medicine')->name('medicine.')->group(function () {
            Route::get('create', [MedicineController::class, 'create'])->name('create');
            Route::post('store', [MedicineController::class, 'store'])->name('store');
            Route::get('/', [MedicineController::class, 'index'])->name('home');
            route::get('{id}', [MedicineController::class, 'edit'])->name('edit');
            route::patch('{id}', [MedicineController::class, 'update'])->name('update');
            route::delete('{id}', [MedicineController::class, 'destroy'])->name('delete');
            route::get('/data/stock', [MedicineController::class, 'stock'])->name('stock');
            route::get('/data/stock/{id}', [MedicineController::class, 'stockEdit'])->name('stock.edit');
            route::patch('/data/stock/{id}', [MedicineController::class, 'stockUpdate'])->name('stock.update');
        });
        Route::prefix('/kelola')->name('kelola.')->group(function () {
            Route::get('/create', [AkunController::class, 'create'])->name('create');
            Route::post('/store', [AkunController::class, 'store'])->name('store');
            Route::get('/', [AkunController::class, 'index'])->name('home');
            route::get('{id}', [AkunController::class, 'edit'])->name('edit');
            route::patch('/{id}', [AkunController::class, 'update'])->name('update');
            route::delete('/{id}', [AkunController::class, 'destroy'])->name('delete');
        });
    });
});
