<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spec extends Model
{
    use HasFactory;
    //
    public function usersWithRoles()
    {
        return $this->belongsToMany(User::class, 'spec_role_user')->withPivot('role_id');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'spec_role_user');
    }

    public function rows()
    {
        return $this->hasMany(SpecRow::class);
    }
}
