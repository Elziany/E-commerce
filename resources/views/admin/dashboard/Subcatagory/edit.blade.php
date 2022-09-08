@extends('admin.dashboard.dash')
                @section('title','edit  subcatagory')
                @section('content')

                @if($errors)
                @foreach($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
  {{@$error}}
</div>
                @endforeach
                @endif

                                                            
                <form class="form" action="{{route('subcatagory.update',$subcatagory->id)}}" method="POST"
                                              enctype="multipart/form-data">

                                         @csrf

                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-home"></i> بيانات القسم </h4>
                                            
                                                    <div class="col-md-6">
                                                        <div>
                                                            <img src="{{asset($subcatagory->image)}}" style="width:200px;height:200px; border-radius:50%">
                                                        </div>
                                                   
                                                        <div class="form-group">
                                                            <label for="projectinput1"> الصورة </label>
                                                            <input type="file" value="{{$subcatagory->image}}" id="name"
                                                                   class="form-control"
                                                                  
                                                                   name="photo">
                                                                   @error('photo')
                                                             <span class="text-danger">{{$message}}</span>
                                                             @enderror
                                                         </div> <select name="maincatagory_id" class="select2 form-control">
                                                                <optgroup label="من فضلك أختر القسم ">
                                                                    @if($catagories && $catagories -> count() > 0)
                                                                        @foreach($catagories as $catagory)
                                                                            <option
                                                                                value="{{$catagory->id }}"
                                                                                @if($catagory->id ===$subcatagory->maincatagory_id) 
                                                                                selected
                                                                                @endif >{{$catagory -> name}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </optgroup>
                                                            </select>


                                                 

                                                        @foreach(active_languages() as $index=>$lang)
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            
                                                        @if($lang->abbr === $subcatagory->local_lang)
                                                            <label for="projectinput1"> {{$lang->name}}    اسم القسم باللغة  </label>
                                                           
                                                            
                                                            <input type="text" value="{{$subcatagory->name}}" id="name"
                                                                   class="form-control"
                                                                  
                                                                   name="catagory[{{$lang->abbr}}][name]">
                                                                  
                                                             
                                                         </div>
                                                    </div>

                                                    <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{$lang->name}}اختصار اللغة </label>
                                                            <input type="text" value="{{$lang->abbr}}" id="name"
                                                                   class="form-control"
                                                                  
                                                                   name="catagory[{{$lang->abbr}}][abbr]">
                                                            
                                                         </div>
                                                    </div>






                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group mt-1">
                                                            <input type="checkbox"  value="1" name="catagory[{{$lang->abbr}}][active]"
                                                                   id="switcheryColor4"
                                                                   class="switchery" data-color="success"
                                                                   @if($subcatagory->activator()==='مفعل')
                                                                   checked
                                                                   @endif />
                                                            <label for="switcheryColor4"
                                                                   class="card-title ml-1">الحالة </label>

                                                            <span class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @else
                                           @foreach($subcatagory->translation as $transalted)
                                           @if($transalted->local_lang === $lang->abbr)
                                           <label for="projectinput1"> {{$lang->name}}    اسم القسم باللغة  </label>
                                                           
                                                            
                                                           <input type="text" value="{{$transalted->value}}" id="name"
                                                                  class="form-control"
                                                                 
                                                                  name="catagory[{{$lang->abbr}}][name]">
                                                                 
                                                            
                                                        </div>
                                                   </div>

                                                   <div class="row">
                                                   <div class="col-md-6">
                                                       <div class="form-group">
                                                           <label for="projectinput1"> {{$lang->name}}اختصار اللغة </label>
                                                           <input type="text" value="{{$lang->abbr}}" id="name"
                                                                  class="form-control"
                                                                 
                                                                  name="catagory[{{$lang->abbr}}][abbr]">
                                                           
                                                        </div>
                                                   </div>

                                                    <div class="row">
                                                   <div class="col-md-6">
                                                       <div class="form-group mt-1">
                                                           <input type="checkbox"  value="1" name="catagory[{{$lang->abbr}}][active]"
                                                                  id="switcheryColor4"
                                                                  class="switchery" data-color="success"
                                                                  @if($transalted->activator()==='مفعل')
                                                                   checked
                                                                   @endif
                                                                   />
                                                           <label for="switcheryColor4"
                                                                  class="card-title ml-1">الحالة </label>

                                                           <span class="text-danger"></span>
                                                       </div>
                                                   </div>
                                               </div>
                                           </div>
                                           @endif
                                           @endforeach
                                            @endif
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