<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        config(['app.locale' => 'id']);
        Carbon::setLocale('id');
        date_default_timezone_set('Asia/Makassar');

        // pagination
        Paginator::useBootstrap();

        $models = array(
            'Anggota',
            'Bantuan',
            'DataLatih',
            'Desa',
            'JadwalPenyuluhan',
            'Kelompok',
            'Lahan',
            'Masuk',
            'Panen',
            'Penyuluh',
            'Saran',
            'User'
        );

        foreach ($models as $model) {
            $this->app->bind("App\Services\Contracts\\{$model}Contract", "App\Services\\{$model}Service");
        }
    }
}
