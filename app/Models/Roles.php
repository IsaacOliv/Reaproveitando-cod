<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'description'
    ];

    public function user_roles()
    {
        return $this->belongsTo(UserRoles::class, 'id_role');
    }
}
