<?php

namespace App\Policies;

use App\Eloquent\User;
use App\Eloquent\Post;

class PostPolicy extends AbstractPolicy
{
    public function read(User $user, Post $ability)
    {
        if (!$this->checkAbility($user, __FUNCTION__, $ability)) {
            return false;
        }

        return true;
    }

    public function write(User $user, Post $ability)
    {
        if (!$this->checkAbility($user, __FUNCTION__, $ability)) {
            return false;
        }

        return true;
    }
}
