<?php

namespace App\Providers;

use App\Excel\ExcelImport;
use App\Excel\MockExcelImportImpl;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ExcelImport::class, MockExcelImportImpl::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
