<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Vendor extends Model
{
    use HasFactory,Notifiable;
    protected $table='vendors';
    protected $fillable=['name','email','phone_number','deprtment_id','active','address','logo'];
    function mainCatagory(){
        return $this->belongsTo(MainCatagory::class,'deprtment_id');
    }
    function activator(){
        return $this->active ===1? "مفعل":'غير مفعل';
    }
}
