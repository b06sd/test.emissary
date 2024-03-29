<?php

namespace App;

use Laratrust\LaratrustRole;

class Role extends LaratrustRole
{
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
