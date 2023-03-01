<?php

namespace Garkavenkov\LaravelAcl\Database\Factories;

use Garkavenkov\LaravelAcl\Models\Permission;
use Illuminate\Database\Eloquent\Factories\Factory;

class PermissionFactory extends Factory
{
    protected $model = Permission::class;
    
    public function definition()
    {
        return [
            'code'          =>  $this->faker->unique()->sentence(1),
            'name'          =>  $this->faker->unique()->sentence(1),
            'description'   =>  $this->faker->sentence(3),
            'error'         =>  $this->faker->sentence(5),
        ];
    }
}