<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCatagory extends Model
{
    use HasFactory;
    protected $table='SubCatagory';
    protected $fillable=[
'name','image','main_catagory_id','active','local_lang'
    ];
    
    function maincatagory(){
        return $this->belongsTo(MainCatagory::class,'main_catagory_id');
    }
    function translation(){
        return $this->hasMany(Translation::class,'item_id');
    }
    function activator(){
        return $this->active===1?'مفعل':'غير مفعل';
    }
}
