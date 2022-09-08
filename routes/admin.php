<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SubcatagoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Vendors;
use Illuminate\Support\Facades\Request;

use Illuminate\Support\Facades\Route;
Route::get('/admin/login', function () {
    return view('admin.login');
})->name('admin.login')->middleware('guest:admin');
Route::post('/admin/login/check',[AdminController::class,'check'] )->name('admin_check');
Route::get('/admin/dashboard',[AdminController::class,'dashboard'] )->name('dashboard')->middleware('auth:admin');
Route::get('/admin/languages',[AdminController::class,'languages'] )->name('admin.languages')->middleware('auth:admin');
Route::get('/admin/new/language',[AdminController::class,'new_language'] )->name('admin.new.language')->middleware('auth:admin');
Route::post('/admin/store/language',[AdminController::class,'store_language'] )->name('admin.store.language')->middleware('auth:admin');
Route::get('/admin/edit/language/{id}',[AdminController::class,'edit_language'] )->name('edit.language')->middleware('auth:admin');
Route::post('/admin/update/language/{id}',[AdminController::class,'update_language'] )->name('update.language')->middleware('auth:admin');
Route::get('/admin/delete/language/{id}',[AdminController::class,'delete_language'] )->name('delete.language')->middleware('auth:admin');

####maincatagory routes#####
Route::get('/admin/main/catagory',[AdminController::class,'main_catagory'] )->name('admin.maincatagory')->middleware('auth:admin');
Route::post('/admin/store/catagory',[AdminController::class,'store_catagory'])->name('admin.store.catagory')->middleware('auth:admin');
Route::get('edit/catagory/{id}',[AdminController::class,'edit_catagory'])->name('edit_catagory')->middleware('auth:admin');
Route::get('delete/catagory/{id}',[AdminController::class,'delete_catagory'])->name('delete_catagory')->middleware('auth:admin');
Route::post('/admin/update/maincatagory/{id}',[AdminController::class,'update_catagory'] )->name('admin.update.catagory')->middleware('auth:admin');
Route::get('/change/statues/{id}',[AdminController::class,'changeStatues'])->name('changeStatues')->middleware('auth:admin');

Route::get('new/catagory',[AdminController::class,'add_new_catagory'])->name('admin.new.catagory')->middleware('auth:admin');

//Route::get('/admin/logout/auth',[AdminController::class,'logout'] )->name('logout');


#####vendors Routes#########

Route::group(['middleware'=>'auth:admin'],function(){
Route::group(['prefix'=>'vendor'],function(){
    
    Route::resource('vendor',Vendors::class); 
Route::get('/changeStatues/{id}',[Vendors::class,'changeStatues'])->name('vendor.changeStatues');
   
    
   

});

});
############### Subcatagory Routes############
Route::group(['middleware'=>'auth:admin'],function(){
Route::get('/subcatagory/index',[SubcatagoryController::class,'index'])->name('subcatagory.index');
Route::get('/subcatagory/new',[SubcatagoryController::class,'new'])->name('new.subcatagory');
Route::post('/subcatagory/store',[SubcatagoryController::class,'store'])->name('subcatagory.store');
Route::get('/subcatagory/delete/{id}',[SubcatagoryController::class,'delete'])->name('delete.subcatagory');
Route::get('/subcatagory/cahnge/statues/{id}',[SubcatagoryController::class,'changeStatues'])->name('change.subcatagory');
Route::get('/subcatagory/edit/{id}',[SubcatagoryController::class,'edit'])->name('edit.subcatagory');
Route::post('/subcatagory/update/{id}',[SubcatagoryController::class,'update'])->name('subcatagory.update');

});
############33
####################33 products Routes###############333
Route::group(['middleware'=>'auth:admin'],function(){
Route::get('/products/index',[ProductController::class,'index'])->name('product.index');
Route::get('/products/new',[ProductController::class,'new'])->name('product.new');
Route::post('/products/store',[ProductController::class,'store'])->name('product.store');
Route::get('/products/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
});