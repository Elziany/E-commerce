<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;

class Admin extends Authenticatable
{
    use HasFactory;
   protected $guarded=[];
   protected $table="admins";
   protected $fillable = [
    'name',
    'email',
    'password',
    'photo'
];
public function name(){
    return $this->name;
}
}
