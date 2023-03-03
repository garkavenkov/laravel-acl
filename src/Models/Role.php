<?php

namespace Garkavenkov\LaravelAcl\Models;

use Garkavenkov\LaravelAcl\Traits\HasPermissions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory, HasPermissions;

    protected $guarded = [];
   
    public function users()
    {
        return $this->belongsToMany(config('auth.providers.users.model'), 'user_role');
    }
}