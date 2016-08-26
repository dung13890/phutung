<?php

namespace App\Policies;

use App\Eloquent\User;
use App\Eloquent\Property;

class PropertyPolicy extends AbstractPolicy
{
    public function read(User $user, Property $ability)
    {
        if (!$this->checkAbility($user, __FUNCTION__, $ability)) {
            return false;
        }

        return true;
    }

    public function write(User $user, Property $ability)
    {
        if (!$this->checkAbility($user, __FUNCTION__, $ability)) {
            return false;
        }

        return true;
    }
}
