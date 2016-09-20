<?php

namespace App\Policies;

use App\Eloquent\User;
use App\Eloquent\File;

class FilePolicy extends AbstractPolicy
{
    public function read(User $user, File $ability)
    {
        return true;
    }

    public function write(User $user, File $ability)
    {
        return true;
    }    
}
