<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table="product";
    protected $fillable=['name','vendor_id','description','subcatagory_id','price','image','active'];

    function translation(){
        return $this->hasMany(Translation::class,'item_id');
    }
    function activator(){
        return $this->active===1?'مفعل':'غير مفعل';
    }
}
