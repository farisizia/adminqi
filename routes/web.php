<?php

use App\Http\Controllers\AutentikasiController;
use App\Http\Controllers\DasborController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PropertiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\Data_UserController;
use App\Http\Controllers\DashboardController;

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
Route::get('/homebjhgdcts',[DashboardController::class, 'index']) ->name('components.pages.home');

Route::get('/master', function () {
    return view('components.template.master');
});

// Route::get('/home', function () {
//     return view('components.pages.home');
// });

Route::get('/property', function () {
    return view('components.pages.management');
});

Route::get('/schedule', function () {
    return view('components.pages.schedule');
});

Route::get('/user', function () {
    return view('components.pages.data-user');
});

Route::get('/admin', function () {
    return view('components.pages.admin');
});

// Route::get('/', function () {
//     return view('components.pages.login');
// });


Route::prefix('autentikasi')->group(function () {
    Route::name('autentikasi.')->group(function () {
        Route::get('/masuk', [AutentikasiController::class, 'masuk'])->name('masuk');
        Route::post('/masuk', [AutentikasiController::class, 'prosesMasuk']);
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/', [DasborController::class, 'indeks'])->name('dasbor');

    Route::prefix('properti')->group(function () {
        Route::get('/', [PropertiController::class, 'indeks'])->name('properti');
        Route::post('/', [PropertiController::class, 'prosesTambah']);
    });

    Route::group(['prefix' => 'property'], function () {
        Route::get('/', [PropertyController::class, 'index'])->name('property.view');
        Route::post('/store', [PropertyController::class, 'store'])->name('property.store');
        Route::get('/edit/{id}', [PropertyController::class, 'edit'])->name('property.edit');
        Route::put('/update/{id}', [PropertyController::class, 'update'])->name('property.update');
        Route::delete('/destroy/{id}', [PropertyController::class, 'deleted'])->name('property.deleted');
        Route::get('/images/{imageId}', [PropertyController::class, 'deleteImage'])->name('property.deleteImage');

    });
});


//Route::post('/home, [BiodataController::class, 'home']);
