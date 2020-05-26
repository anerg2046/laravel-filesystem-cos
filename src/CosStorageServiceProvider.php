<?php

namespace Dscmall\Flysystem\Cos;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use League\Flysystem\Filesystem;

/**
 * Class CosStorageServiceProvider
 */
class CosStorageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        Storage::extend('cos', function () {
            return new Filesystem(new CosAdapter(\config('filesystems.disks.cos')));
        });
    }

    /**
     * Register any application services.
     */
    public function register()
    {
        //
    }
}
