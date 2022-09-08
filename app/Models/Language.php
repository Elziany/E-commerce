<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;
    protected $table='languages';
    protected $fillable=['name','abbr','local','direction','active','created_at','deleted_at'];
    function activator(){
        return $this->active ===1?'مفعل':'غير مفعل';
    }
}
