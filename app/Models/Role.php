<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Role extends Model
{
    use HasFactory;
    const ROLE_ADMIN = 3;
    const ROLE_MANAGER = 2;
    const ROLE_USER = 1;


    public function User(){
        return $this->hasMany(User::class);
    }
}
