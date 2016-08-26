<?php

namespace App\Policies;

use App\Eloquent\User;
use App\Eloquent\Config;

class ConfigPolicy extends AbstractPolicy
{
    public function read(User $user, Config $ability)
    {
        if (!$this->checkAbility($user, __FUNCTION__, $ability)) {
            return false;
        }

        return true;
    }

    public function write(User $user, Config $ability)
    {
        if (!$this->checkAbility($user, __FUNCTION__, $ability)) {
            return false;
        }

        return true;
    }
}
