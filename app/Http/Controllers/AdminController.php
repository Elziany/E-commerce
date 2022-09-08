<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\loginRequest;
use App\Http\Requests\MainCatagoryRequest;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use App\Models\Language;
use App\Models\MainCatagory;
use App\Models\Translation;
use App\Http\Requests\LanguageCreate;
use Illuminate\Support\Facades\App;
use Config;
use Illuminate\Support\Str;


class AdminController extends Controller
{
    function check(loginRequest $request){
    
        $email=$request->email;
        $password=$request->password; 

        
        if(Auth::guard('admin')->attempt((['email'=>$email,'password'=>$password]))) {
            $admin=Admin::find(Auth::guard('admin')->id());
            return view('admin.dashboard.dash',compact('admin'));
        }    
        else{
            return 'unauth';
        }

    }
    #############
    function dashboard(){
        return view('admin.dashboard.dash');
        }
        ###########
    function logout(){
            Auth::guard('admin')->logout();
            return redirect()-> route('admin.login');
            }
            ###########
     function languages(){
                $languages=Language::get()->all();
                return view('admin.dashboard.language.language',compact('languages'));
                }
                ##############
function new_language(){
                    return view('admin.dashboard.language.new_langauge');
                }
                ##########################

     function store_language(LanguageCreate $request){
                 if (!$request->has('active')){
                    $request->request->add(['active'=>0]);
                 }
                 Language::create($request->except(['_token']));
                 return back();
                    }
                    ##############################3

    function edit_language($id){
                      
                        $language=Language::find($id);
                        return view('admin.dashboard.language.edit_language',compact('language'));
                           }
                           ############################
    function update_language(LanguageCreate $request,$id){
                                if(!$request->has('active')){
                                    $request->request->add(['active'=>0]);
                                }
                      
                            Language::find($id)->update($request->except(['_token']));
                            return redirect()->route('admin.languages');
                               }
                               #############################3
function delete_language($id){
    Language::find($id)->delete();
    return redirect()->route('admin.languages');

}
######################3
function main_catagory(){
    $maincatagories=MainCatagory::paginate(4);
    return view('admin.dashboard.Main_catagory.catagory',compact('maincatagories'));
    }
    ###############################
function add_new_catagory(){
        return view('admin.dashboard.Main_catagory.new_catagory');

                }
                ###############################3
                function store_catagory(MainCatagoryRequest $req){
                    if($req->has('photo')){
                     
                        $filepath=upload_image('images/maincatagory/',$req->file('photo'));
                    
                    }
                 
                   if(array_key_exists(Config::get('app.locale'),$req->catagory)){
                    $defualt_catagory=$req->catagory[Config::get('app.locale')];
                    $maincatagory=MainCatagory::create([
                        'photo'=>$filepath,
                        'name'=>$defualt_catagory['name'],
                        'abbr'=>$defualt_catagory['abbr'],
                        'active'=>$defualt_catagory['active'],
                        'slug'=>$defualt_catagory['name'],
                        'language_local'=>Config::get('app.locale'),
                    ]);
              
            
                   }
                   foreach(active_languages() as $lang){
                    
                    if(Config::get('app.locale')!==$lang->abbr){
                        if(!array_key_exists('active',$req->catagory[$lang->abbr])){
                            $active=0;
                        }
                        else{
                            $active=1;
                        }
                    Translation::create([
                        'local_lang'=>$lang->abbr,
                        'item_name'=>'maincatagory',
                        'item_id'=>$maincatagory->id,
                        'value'=>$req->catagory[$lang->abbr]['name'],
                       
                        'active'=>$active
                    ]);
                    }
                
                 }
                   
                   return redirect()->route('admin.maincatagory');
                }
                  function edit_catagory($id){
                    $catagory=MainCatagory::find($id);
                    return view('admin.dashboard.Main_catagory.edit_maincatagory',compact('catagory'));
                  }
                  ///////////////////////

                  function delete_catagory($id){
                 $maincatagory=MainCatagory::find($id);
                 $maincatagory->delete();
                 unlink($maincatagory->photo);
                 
                 return redirect()->route('admin.maincatagory');
                  }
                  ///////////////////////////
        
                    function update_catagory($id,MainCatagoryRequest $req){
                        $defualt_catagory=MainCatagory::find($id);
                        $translated_catagory=Translation::where('main_catagory_id',$id)->get();
                    foreach(active_languages() as $lang){
                        if($defualt_catagory->language_local===$lang->abbr){
                           
                            if(array_key_exists('active',$req->catagory[$lang->abbr])){
                              
                                $active=1;
                            }
                            else{
                                $active=0;
                            }
                            if($req->has('photo')){
                                $filepath=upload_image('images/maincatagory/',$req->file('photo'));
                            }
                            else{
                                $filepath=$defualt_catagory->photo;
                            }
                            $defualt_catagory->update([
                                'name'=>$req->catagory[$lang->abbr]['name'],
                                'active'=>$active,
                                'photo'=>$filepath
                        ]);

                        }
                        else{
                            foreach($translated_catagory as $translated){
                                if($translated->language_local=== $lang->abbr){
                                    if(array_key_exists('active',$req->catagory[$lang->abbr])){
                                        $active=1;
                                    }
                                    else{
                                        $active=0;
                                    }

                                    ##update ####
                                    $translated->update([
                                        'value'=>$req->catagory[$lang->abbr]['name'],
                                        'active'=>$active,
                                        

                                
                                
                                ]);
                                 
                                }
                            }
                        }
                    }
                    return redirect()->route('admin.maincatagory');
                }
                ###############################
                function changeStatues($id){
                 
                    try{
                    $catagory=MainCatagory::find($id);
                  
                   $stauts=$catagory->active ===1?0:1;
                    $catagory->update(['active'=>$stauts]);

                    return redirect()->back()->with('success','تم تغير الحالة ');
                }
                catch(\Exception $ex){
                    return redirect()->back()->with('error','حدث خطا ما');
                }
                }
            }
                
        