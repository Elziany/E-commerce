<?php
function get_language_number(){
    return App\Models\Language::where('active',1)->count();
}
function active_languages(){
    return App\Models\Language::where('active',1)->get();
}
function get_mainCatagory_number(){
    return App\Models\MainCatagory::where('active',1)->count();
}
function vendors_number(){
    return App\Models\Vendor::where('active',1)->count();
}
function upload_image($folder,$file){
   
   $file_name=$file->hashName();
   $file->move($folder,$file_name);
   $path=$folder.$file_name;
   return $path;
 



}
 function get_number_subcatagory(){
    return App\Models\Subcatagory::where('active',1)->count();
 }