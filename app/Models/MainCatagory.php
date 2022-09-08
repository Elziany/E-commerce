<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Observers\MaincatagoryObserver;

use Illuminate\Support\ServiceProvider;

class MainCatagory extends Model
{
    use HasFactory;
    protected $table="main_catagory";
    protected $fillable=[
        'name','photo','active','slug','language_local'
    ];
    
    function translation(){
        return $this->hasMany(Translation::class,'item_id');
    }
    function activator(){
        return $this->active ===1? "مفعل":'غير مفعل';
    }
 
    function vendors(){
        return $this->hasMany(Vendor::class,'deprtment_id');
    }
    function subcatagories(){
        return $this->hasMany(SubCatagory::class,'main_catagory_id');
    }
 

    protected static function boot()
    {
        parent::boot();
        MainCatagory::observe(MaincatagoryObserver::class);
    }
}
