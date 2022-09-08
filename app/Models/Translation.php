<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    use HasFactory;
    protected $table="translation";
    protected $fillable=[
        'local_lang',
        'item_name',
        'item_id',
        'active',
        'price',
        'value',
      
       

    ];
    function main(){
        return $this->belongsTo(MainCatagory::class,'item_id')->where('item_name','maincatagory');
    }
    function sub(){
        return $this->belongsTo(Subcatagory::class,'item_id')->where('item_name','subcatagory');
    }
    function product(){
        return $this->belongsTo(Product::class,'item_id')->where('item_name','product');
    }
    function activator(){
        return $this->active ===1? "مفعل":'غير مفعل';
    }

}
