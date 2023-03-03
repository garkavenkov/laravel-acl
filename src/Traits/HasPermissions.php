<?php

namespace Garkavenkov\LaravelAcl\Traits;

use Garkavenkov\LaravelAcl\Models\Permission;

trait HasPermissions
{
    public function permissions()
    {        
        return $this->morphToMany(Permission::class, 'owner', 'acl');        
    }

    public function givePermissionTo(Permission $permission)
    {
        $this->permissions()->attach($permission);
    }
    
    public function hasPermissionTo(string $permission): bool
    {
        $permissions = [];       
        
        // Direct permissions 
        if ($this->permissions->count() > 0) {
            array_push($permissions, ...$this->permissions->map(function($p) { return $p->code;}) );
        }

        // Role's permissions
        if ($this->roles->count() > 0) {
            foreach($this->roles as $role) {                
                array_push($permissions, ...$role->permissions->map(function($p) { return $p->code;}) );
            }
        }      
        return in_array($permission, $permissions) ? true : false;
    }
}