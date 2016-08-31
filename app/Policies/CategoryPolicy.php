<?php

namespace App\Policies;

use App\Eloquent\User;
use App\Eloquent\Category;

class CategoryPolicy extends AbstractPolicy
{
    public function read(User $user, Category $ability)
    {
        if (!$this->checkAbility($user, __FUNCTION__, $ability)) {
            return false;
        }

        return true;
    }

    public function write(User $user, Category $ability)
    {
        if (!$this->checkAbility($user, __FUNCTION__, $ability)) {
            return false;
        }

        if ($ability->id) {
            if ($ability->id == 1) {
                return false;
            }
            if ($ability->id == 2) {
                return false;
            }
            if ($user->id == 3) {
                return false;
            }
        }

        return true;
    }
}
