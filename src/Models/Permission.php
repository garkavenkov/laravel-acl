<?php 

namespace Garkavenkov\LaravelAcl\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function roles()
    {
        return $this->morphedByMany(Role::class, 'owner', 'acl');
    }

    public function assignTo(Model $model)
    {
        $this->roles()->attach($model);
    }
}