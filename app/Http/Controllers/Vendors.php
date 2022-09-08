<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Models\MainCatagory;
use App\Http\Requests\VendorRequest;
use Illuminate\Support\Facades\Notification;
use App\Notifications\VendorNotification;
use App\Mail\VendorMail;
use Illuminate\Support\Facades\Mail;



class Vendors extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendors=Vendor::paginate(4);
        return view('admin.dashboard.vendors.index',compact('vendors'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catagories=MainCatagory::where('active',1)->get();
        return view('admin.dashboard.vendors.create_vendor',compact('catagories'));
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VendorRequest $request)
    {
        $active=0;
      if($request->has('active')){
        $active=1;
      }
      if($request->has('logo')){
        $filepath=upload_image('images/vendorsLogo/',$request->file('logo'));
      }
      else{
        $filepath='images/vendorsLogo/defualt';
      }
 
      $vendor=Vendor::create([
        'name'=>$request->name,
        'phone_number'=>$request->phone,
        'logo'=>$filepath,
        'deprtment_id'=>$request->catagory_id,
        'active'=>$active,
        'address'=>$request->address,
        'email'=>$request->email

      ]);
   
          return redirect()->route('vendor.index');
    
  
     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vendor=Vendor::find($id);
        $catagories=MainCatagory::where('active',1)->get();
        return view('admin.dashboard.vendors.edit_vendor',compact(['vendor','catagories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VendorRequest $request, $id)
    {
      $vendor=Vendor::find($id);
      if(!$request->has('active')){
        $request->request->add(['active'=>0]);
      }
      if($request->has('logo')){
        $filepath=upload_image('images/vendorsLogo/',$request->file('logo'));

      }
      else{
        $filepath=$vendor->logo;
      }
      $vendor->update([
        'name'=>$request->name,
        'phone_number'=>$request->phone,
        'logo'=>$filepath,
        'deprtment_id'=>$request->catagory_id,
        'active'=>$request->active,
        'address'=>$request->address,
        'email'=>$request->email

      ]);
      return redirect()->route('vendor.index');

       

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    
      $vendor=Vendor::find($id);
      try{
      unlink($vendor->logo);
      $vendor->delete();
      }
      catch(\Exception $ex){
        $vendor->delete();
        return redirect()->route('vendor.index');

      }

      return redirect()->route('vendor.index');
    }
    function changeStatues($id){
                 
      try{
        $vendor=Vendor::find($id);
    
     $stauts=$vendor->active ===1?0:1;
      $vendor->update(['active'=>$stauts]);

      return redirect()->back()->with('success','تم تغير الحالة ');
  }
  catch(\Exception $ex){
      return redirect()->back()->with('error','حدث خطا ما');
  }
  }
}
