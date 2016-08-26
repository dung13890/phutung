<?php

namespace App\Policies;

use App\Eloquent\User;
use App\Eloquent\Page;

class PagePolicy extends AbstractPolicy
{
    public function read(User $user, Page $ability)
    {
        if (!$this->checkAbility($user, __FUNCTION__, $ability)) {
            return false;
        }

        return true;
    }

    public function write(User $user, Page $ability)
    {
        if (!$this->checkAbility($user, __FUNCTION__, $ability)) {
            return false;
        }

        return true;
    }
}
