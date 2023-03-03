<?php

namespace Garkavenkov\LaravelAcl\Traits;

use Garkavenkov\LaravelAcl\Models\Role;
use Garkavenkov\LaravelAcl\Models\Permission;

trait HasRoles
{
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_role');
    }

    public function assignRole(Role $role)
    {
        return $this->roles()->attach($role);
    }

    public function hasRole($role)
    {
        $roles = $this->roles
                    ->map(function($role) {
                        return $role->code;
                    })->toArray();

        return in_array($role, $roles) ? true : false;
    }  
}