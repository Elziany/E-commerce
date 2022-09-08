<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCatagory;
use App\Models\MainCatagory;
use App\Models\Translation;

use App\Http\Requests\subRequest;
use Config;


class SubcatagoryController extends Controller
{
    //
    function index(){
        try{
            $subcatagories=SubCatagory::all();
        return view('admin.dashboard.subcatagory.index',compact('subcatagories'));
        }
        catch(\Exception $ex){
            return $ex;
        }
    }


    // new view of adding sub catagory
    function new(){
        try{
            $catagories=MainCatagory::all();
        return view('admin.dashboard.subcatagory.new',compact('catagories'));
        }
        catch(\Exception $ex){
            return $ex;
        }

    }


    //store new catagory
    function store(subRequest $req){
   
        if($req->has('image')){
            $filepath=upload_image('public/images/subcatagory/',$req->image);
        }

      
     try{
  $subcatagory= Subcatagory::create([
        'name'=>$req->catagory[\App::getLocale()]['name'],
        'active'=>$req->catagory[\App::getLocale()]['active'],
        'main_catagory_id'=>$req->maincatagory_id,
        'image'=>$filepath
   ]);

        foreach(active_languages() as $lang){
                    if($lang->abbr===\App::getLocale() || $req->catagory[$lang->abbr]===null){
                        continue;
                    }
            
                    else{
                        Translation::create([
                            'local_lang'=>$lang->abbr,
                            'item_name'=>'subcatagory',
                            'item_id'=>$subcatagory->id,
                            'value'=>$req->catagory[$lang->abbr]['name'],
                           
                            'active'=>$req->catagory[$lang->abbr]['active']
                        ]);
                    }
        }



        return redirect()->route('subcatagory.index');

   }


     
        
        catch(\Exception $ex){
            return $ex;
        }

    }

########## Delete subcatagory########3
    function delete($id){
        try{
            $subcatagory=Subcatagory::find($id);
            unlinke($subcatagory->image);
            $subcatagory->delete();

            return redirect()->route('subcatagory.index');

        }
     

             catch(\Exception $ex){
                 return $ex;
             }
     
    }
    ####change statues #######3
    function changeStatues($id){
                 
        try{
        $subcatagory=Subcatagory::find($id);
      
       $stauts=$subcatagory->active ===1?0:1;
        $subcatagory->update(['active'=>$stauts]);

        return redirect()->back()->with('success','تم تغير الحالة ');
    }
    catch(\Exception $ex){
        return redirect()->back()->with('error','حدث خطا ما');
    }
    }
    ########### edit view page #########3

    function edit($id){
       try{
         $subcatagory=Subcatagory::find($id);
        $catagories=MainCatagory::all();
        return view('admin.dashboard.subcatagory.edit',compact(['subcatagory','catagories']));
       } 
       catch(\Exception $ex){
        return redirect()->back()->with('error','حدث خطا ما');
    }
    }


    ########update subcatagory ifo #######
    function update(subRequest $req,$id){
      
       
        try{
          
        $subcatagory=Subcatagory::find($id);
        $filepath=$subcatagory->image;
       if($req->has('image')){
            $filepath=upload_image('public/images/subcatagory/',$req->image);
        }
      $subcatagory->update([
            'name'=>$req->catagory[\App::getlocale()]['name'],
            'active'=>$req->catagory[\App::getlocale()]['active'],
            'local_lang'=>\App::getLocale(),
            'image'=>$filepath,
            'main_catagory_id'=>$req->maincatagory_id

        ]);

        foreach($subcatagory->translation as $translated){
          if(array_key_exists($translated->local_lang,$req->catagory)){
            $translated->update([
                    'item_name'=>'subcatagory',
                    'item_id'=>$id,
                    'local_lang'=>$translated->local_lang,
                    'value'=>$req->catagory[$translated->local_lang]['name'],
                    'active'=>$req->catagory[$translated->local_lang]['active']
            ]);
          }
        }

        return redirect()->route('subcatagory.index');
           
        }
        catch(\Exception $ex){
            return $ex;
           // return redirect()->back()->with('error','حدث خطا ما');
        }

    }
}
