<?php

namespace App\Policies;

use App\Eloquent\User;
use App\Eloquent\Position;

class PositionPolicy extends AbstractPolicy
{
    public function read(User $user, Position $ability)
    {
        if (!$this->checkAbility($user, __FUNCTION__, $ability)) {
            return false;
        }

        return true;
    }

    public function write(User $user, Position $ability)
    {
        if (!$this->checkAbility($user, __FUNCTION__, $ability)) {
            return false;
        }

        return true;
    }
}
