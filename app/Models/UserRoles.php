<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRoles extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'id_role'
    ];


    public function users()
    {
        return $this->hasMany(User::class);    //User_roles<-Users
    }
    public function roles()
    {
        return $this->hasMany(Roles::class);    //User_roles<-Roles
    }

}
