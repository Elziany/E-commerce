<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\vendor;
use App\Models\SubCatagory;
use App\Models\Translation;
use App\Http\Requests\ProductRe;
/*  try{
           
            }
            catch(\Exception $ex){
                return$ex;
            }*/

class ProductController extends Controller
{
    // return index product view
    function index(){
        try{
        $products=Product::all();
        return view('admin.dashboard.products.index',compact('products'));
        }
        catch(\Exception $ex){
            return$ex;
        }
    }
    ################### new product view page ########3
    function new(){
        try{
            $vendors=Vendor::all();
            $subcatagories=SubCatagory::all();
           return view('admin.dashboard.products.new',compact(['vendors','subcatagories'])); 
            }
            catch(\Exception $ex){
                return $ex;
            }
    }
     ######### store nw product3#########3
function store(ProductRe $req){
    try{
    
        if($req->has('image')){
            $filepath=upload_image('public/images/products/',$req->image);
        }
      $product=Product::create([
            'name'=>$req->product[\App::getlocale()]['name'],
            'description'=>$req->product[\App::getlocale()]['description'],
            'image'=>$filepath,
            'vendor_id'=>$req->vendor_id,
            'subcatagory_id'=>$req->subcatagory_id,
            'price'=>$req->product[\App::getlocale()]['price'],
            'active'=>$req->product[\App::getlocale()]['active']
      ]); 
      
      
      foreach(active_languages() as $lang){
        if($lang->abbr===\App::getLocale() || $req->product[$lang->abbr]===null){
            continue;
        }

        else{
            Translation::create([
                'local_lang'=>$lang->abbr,
                'item_name'=>'product',
                'item_id'=>$product->id,
                'value'=>$req->product[$lang->abbr]['name'],
                'price'=>$req->product[$lang->abbr]['price'],
                'active'=>$req->product[$lang->abbr]['active']
            ]);
            }
    }


    return redirect()->route('product.index')->with('msg','one item added successfully');
    }
    catch(\Exception $ex){
        return$ex;
    }
}



#############edit view page######

function edit($id){
    $product=Product::find($id);
    $subcatagories=SubCatagory::all();
    $vendors=Vendor::all();

    return view('admin.dashboard.products.edit',compact(['product','subcatagories','vendors']));
}

}