<?php

namespace App\Policies;

use App\Eloquent\User;
use App\Eloquent\Product;

class ProductPolicy extends AbstractPolicy
{
    public function read(User $user, Product $ability)
    {
        if (!$this->checkAbility($user, __FUNCTION__, $ability)) {
            return false;
        }

        return true;
    }

    public function write(User $user, Product $ability)
    {
        if (!$this->checkAbility($user, __FUNCTION__, $ability)) {
            return false;
        }

        return true;
    }
}
