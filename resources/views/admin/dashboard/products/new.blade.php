@extends('admin.dashboard.dash')
                @section('title','add product')
                @section('content')

                @if($errors)
                @foreach($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
  {{@$error}}
</div>
                @endforeach
                @endif

                                                            
                <form class="form" action="{{route('product.store')}}" method="POST"
                                              enctype="multipart/form-data">

                                         @csrf

                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-home"></i> بيانات القسم </h4>
                                            
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> الصورة </label>
                                                            <input type="file" value="" id="name"
                                                                   class="form-control"
                                                                  
                                                                   name="image">
                                                                   @error('image')
                                                             <span class="text-danger">{{$message}}</span>
                                                             @enderror
                                                         </div>

                                                        <label>القسم الفرعي
</label> 
                                                        <select name="subcatagory_id" class="select2 form-control">
                                                                <optgroup label="من فضلك أختر القسم ">
                                                                    @if($subcatagories && $subcatagories -> count() > 0)
                                                                        @foreach($subcatagories as $subcatagory)
                                                                            <option
                                                                                value="{{$subcatagory -> id }}">{{$subcatagory -> name}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </optgroup>
                                                            </select>
                                                 

                                                            
                                                        

                                                        <label>اسم التاجر</label>
                                                        <select name="vendor_id" class="select2 form-control">
                                                                <optgroup label="من فضلك أختر اسم التاجر ">
                                                                    @if($vendors && $vendors -> count() > 0)
                                                                        @foreach($vendors as $vendor)
                                                                            <option
                                                                                value="{{$vendor -> id }}">{{$vendor -> name}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </optgroup>
                                                            </select>
                                                 
                                                            <hr/>
                                                        @foreach(active_languages() as $index=>$lang)
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{$lang->name}}  اسم القسم باللغة  </label>
                                                            <input type="text" value="" id="name"
                                                                   class="form-control"
                                                                  
                                                                   name="product[{{$lang->abbr}}][name]">
                                                             
                                                         </div>
                                                    </div>
                                                    </div>


                                                    <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{$lang->name}}  وصف القسم باللغة  </label>
                                                            <textarea type="text" value="" id="name"
                                                                   class="form-control"
                                                                  
                                                                   name="product[{{$lang->abbr}}][description]"></textarea>
                                                             
                                                         </div>
                                                    </div>
                                                    </div>
                                                   



                                                    <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{$lang->name}}اختصار اللغة </label>
                                                            <input type="text" value="{{$lang->abbr}}" id="name"
                                                                   class="form-control"
                                                                  
                                                                   name="product[{{$lang->abbr}}][abbr]" >
                                                            
                                                         </div>
                                                    </div>
                                                    </div>


                                                    <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> السعر </label>
                                                            <input type="text" value="" id="name"
                                                                   class="form-control"
                                                                  
                                                                   name="product[{{$lang->abbr}}][price]" >
                                                            
                                                         </div>
                                                    </div>
                                                    </div>






                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group mt-1">
                                                            <input type="checkbox"  value="1" name="product[{{$lang->abbr}}][active]"
                                                                   id="switcheryColor4"
                                                                   class="switchery" data-color="success"
                                                                   checked />
                                                            <label for="switcheryColor4"
                                                                   class="card-title ml-1">الحالة </label>

                                                            <span class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>



                                               
                                                    <hr>

                                                @endforeach
                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i> تراجع
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> حفظ
                                                </button>
                                            </div>
                                        </form>
                                        @endsection