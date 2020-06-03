<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    public function users()
    {
        return $this
            ->belongsToMany('App\User')
            ->withTimestamps();
    }

    public function role()
    {
        return $this
            ->belongsToMany('App\Role')
            ->withTimestamps();
    }

}
