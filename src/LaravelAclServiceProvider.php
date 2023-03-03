<?php

namespace Garkavenkov\LaravelAcl;

use Garkavenkov\LaravelAcl\Console\InstallLaravelAcl;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Garkavenkov\LaravelAcl\Models\Permission;

class LaravelAclServiceProvider extends ServiceProvider
{
    public function register()
    {
        # code...
    }

    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        if (!app()->runningInConsole()) {
            $this->definePermissions();
        }        
    }

    private function definePermissions()
    {
        try {
            Permission::get()->map(function ($permission) {
                Gate::define($permission->code, function ($user) use ($permission) {
                    return $user->hasPermissionTo($permission->code)
                                ? Response::allow()
                                : Response::deny( isset($permission->error) ? $permission->error : 'WTF');
                });
            });
        } catch (\Exception $e) {
            report($e);
            return false;
        }
    }
}