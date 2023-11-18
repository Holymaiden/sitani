<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Artisan;
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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['prefix' => 'admin',  'namespace' => 'App\Http\Controllers\Admin',  'middleware' => ['auth']], function () {
    Route::group(['prefix' => ''], function () {
        Route::get('/', 'DashboardController@index')->name('dashboard');
    });

    Route::group(['prefix' => '/anggota'], function () {
        Route::get('/', 'AnggotaController@index')->name('anggota');
        Route::get('/data', 'AnggotaController@data')->name('anggota.data');
        Route::post('/store', 'AnggotaController@store')->name('anggota.store');
        Route::get('/{id}/edit', 'AnggotaController@show')->name('anggota.show');
        Route::put('/{id}', 'AnggotaController@update')->name('anggota.update');
        Route::delete('/{id}', 'AnggotaController@destroy')->name('anggota.delete');
    });

    Route::group(['prefix' => '/bantuan'], function () {
        Route::get('/', 'BantuanController@index')->name('bantuan');
        Route::get('/data', 'BantuanController@data')->name('bantuan.data');
        Route::post('/store', 'BantuanController@store')->name('bantuan.store');
        Route::get('/{id}/edit', 'BantuanController@show')->name('bantuan.show');
        Route::put('/{id}', 'BantuanController@update')->name('bantuan.update');
        Route::delete('/{id}', 'BantuanController@destroy')->name('bantuan.delete');
    });

    Route::group(['prefix' => '/data-latih'], function () {
        Route::get('/', 'DataLatihController@index')->name('data-latih');
        Route::get('/data', 'DataLatihController@data')->name('data-latih.data');
        Route::post('/store', 'DataLatihController@store')->name('data-latih.store');
        Route::get('/{id}/edit', 'DataLatihController@show')->name('data-latih.show');
        Route::put('/{id}', 'DataLatihController@update')->name('data-latih.update');
        Route::delete('/{id}', 'DataLatihController@destroy')->name('data-latih.delete');
    });

    Route::group(['prefix' => '/desa'], function () {
        Route::get('/', 'DesaController@index')->name('desa');
        Route::get('/data', 'DesaController@data')->name('desa.data');
        Route::post('/store', 'DesaController@store')->name('desa.store');
        Route::get('/{id}/edit', 'DesaController@show')->name('desa.show');
        Route::put('/{id}', 'DesaController@update')->name('desa.update');
        Route::delete('/{id}', 'DesaController@destroy')->name('desa.delete');
    });

    Route::group(['prefix' => '/jadwal-penyuluhan'], function () {
        Route::get('/', 'JadwalPenyuluhanController@index')->name('jadwal-penyuluhan');
        Route::get('/data', 'JadwalPenyuluhanController@data')->name('jadwal-penyuluhan.data');
        Route::post('/store', 'JadwalPenyuluhanController@store')->name('jadwal-penyuluhan.store');
        Route::get('/{id}/edit', 'JadwalPenyuluhanController@show')->name('jadwal-penyuluhan.show');
        Route::put('/{id}', 'JadwalPenyuluhanController@update')->name('jadwal-penyuluhan.update');
        Route::delete('/{id}', 'JadwalPenyuluhanController@destroy')->name('jadwal-penyuluhan.delete');
    });

    Route::group(['prefix' => '/kelompok'], function () {
        Route::get('/', 'KelompokController@index')->name('kelompok');
        Route::get('/data', 'KelompokController@data')->name('kelompok.data');
        Route::post('/store', 'KelompokController@store')->name('kelompok.store');
        Route::get('/{id}/edit', 'KelompokController@show')->name('kelompok.show');
        Route::put('/{id}', 'KelompokController@update')->name('kelompok.update');
        Route::delete('/{id}', 'KelompokController@destroy')->name('kelompok.delete');
    });

    Route::group(['prefix' => '/lahan'], function () {
        Route::get('/', 'LahanController@index')->name('lahan');
        Route::get('/data', 'LahanController@data')->name('lahan.data');
        Route::post('/store', 'LahanController@store')->name('lahan.store');
        Route::get('/{id}/edit', 'LahanController@show')->name('lahan.show');
        Route::put('/{id}', 'LahanController@update')->name('lahan.update');
        Route::delete('/{id}', 'LahanController@destroy')->name('lahan.delete');
    });

    Route::group(['prefix' => '/masuk'], function () {
        Route::get('/', 'MasukController@index')->name('masuk');
        Route::get('/data', 'MasukController@data')->name('masuk.data');
        Route::post('/store', 'MasukController@store')->name('masuk.store');
        Route::get('/{id}/edit', 'MasukController@show')->name('masuk.show');
        Route::put('/{id}', 'MasukController@update')->name('masuk.update');
        Route::delete('/{id}', 'MasukController@destroy')->name('masuk.delete');
    });

    Route::group(['prefix' => '/naive-bayes'], function () {
        Route::get('/', 'NaiveBayesController@index')->name('naive-bayes');
        Route::get('/data', 'NaiveBayesController@data')->name('naive-bayes.data');
        Route::post('/store', 'NaiveBayesController@store')->name('naive-bayes.store');
    });

    Route::group(['prefix' => '/panen'], function () {
        Route::get('/', 'PanenController@index')->name('panen');
        Route::get('/data', 'PanenController@data')->name('panen.data');
        Route::post('/store', 'PanenController@store')->name('panen.store');
        Route::get('/{id}/edit', 'PanenController@show')->name('panen.show');
        Route::put('/{id}', 'PanenController@update')->name('panen.update');
        Route::delete('/{id}', 'PanenController@destroy')->name('panen.delete');
    });

    Route::group(['prefix' => '/penyuluh'], function () {
        Route::get('/', 'PenyuluhController@index')->name('penyuluh');
        Route::get('/data', 'PenyuluhController@data')->name('penyuluh.data');
        Route::post('/store', 'PenyuluhController@store')->name('penyuluh.store');
        Route::get('/{id}/edit', 'PenyuluhController@show')->name('penyuluh.show');
        Route::put('/{id}', 'PenyuluhController@update')->name('penyuluh.update');
        Route::delete('/{id}', 'PenyuluhController@destroy')->name('penyuluh.delete');
    });

    Route::group(['prefix' => '/perhitungan'], function () {
        Route::get('/', 'NaiveBayesController@index_perhitungan')->name('perhitungan');
        Route::get('/data', 'NaiveBayesController@data_perhitungan')->name('perhitungan.data');
    });

    Route::group(['prefix' => '/saran'], function () {
        Route::get('/', 'SaranController@index')->name('saran');
        Route::get('/data', 'SaranController@data')->name('saran.data');
        Route::post('/store', 'SaranController@store')->name('saran.store');
        Route::get('/{id}/edit', 'SaranController@show')->name('saran.show');
        Route::put('/{id}', 'SaranController@update')->name('saran.update');
        Route::delete('/{id}', 'SaranController@destroy')->name('saran.delete');
    });

    Route::group(['prefix' => '/users'], function () {
        Route::get('/', 'UserController@index')->name('users');
        Route::get('/data', 'UserController@data')->name('users.data');
        Route::post('/store', 'UserController@store')->name('users.store');
        Route::get('/{id}/edit', 'UserController@show')->name('users.show');
        Route::put('/{id}', 'UserController@update')->name('users.update');
        Route::delete('/{id}', 'UserController@destroy')->name('users.delete');
    });

    Route::group(['prefix' => '/profile'], function () {
        Route::get('/', 'ProfileController@index')->name('profile');
    });
});

Route::group(['prefix' => '',  'namespace' => 'App\Http\Controllers\User'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/kelompok-tani', 'HomeController@kelompok_tani')->name('user.kelompok-tani');
    Route::get('/bantuan', 'HomeController@bantuan')->name('user.bantuan');
    Route::get('/jadwal-penyuluhan', 'HomeController@jadwal_penyuluhan')->name('user.jadwal-penyuluhan');
    Route::get('/panen', 'HomeController@panen')->name('user.panen');
    Route::get('kritik-saran', 'HomeController@kritik_saran')->name('user.kritik-saran');
    Route::post('/kritik-saran', 'HomeController@kritik_saran_store')->name('user.kritik-saran-store');
});

Route::get('/cc', function () {
    Artisan::call('optimize:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
});

require __DIR__ . '/auth.php';
