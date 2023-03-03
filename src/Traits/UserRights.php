<?php

namespace Garkavenkov\LaravelAcl\Traits;

use Illuminate\Support\Facades\Gate;

trait UserRights
{
    public function checkIfUserHasRightsTo($module)
    {
        $method = '';
        switch (request()->method()) {
            case 'GET':
                $method = 'read';
                break;
            case 'POST':
                $method = 'create';
                break;
            case 'PATCH':
                $method = 'update';
                break;
            case 'DELETE':
                $method = 'delete';
                break;
            default:
                throw new \Exception("Недійсний метод '$method'.");
                break;
        }

        if (!Gate::has("$module:$method")) {
            throw new \Exception("Дозвіл '$module:$method' відсутній в довіднику 'Дозвіли'. <br/>Зверніться до адміністратора.");
        }
        Gate::authorize("$module:$method");
    }
}