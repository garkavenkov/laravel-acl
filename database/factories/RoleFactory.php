<?php

namespace Garkavenkov\LaravelAcl\Database\Factories;

use Garkavenkov\LaravelAcl\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
    protected $model = Role::class;
    
    public function definition()
    {
        return [
            'code'          =>  $this->faker->unique()->sentence(1),
            'name'          =>  $this->faker->unique()->sentence(1),
            'description'   =>  $this->faker->sentence(3),
        ];
    }
}