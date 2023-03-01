<?php

namespace Garkavenkov\LaravelAcl;

use Illuminate\Support\ServiceProvider;

class LaravelAclServiceProvider extends ServiceProvider
{
    public function register()
    {
        # code...
    }

    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }
}