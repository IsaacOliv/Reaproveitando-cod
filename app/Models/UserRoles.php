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


    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
    public function role()
    {
        return $this->belongsTo(Roles::class, 'id_role', 'id');
    }


}
