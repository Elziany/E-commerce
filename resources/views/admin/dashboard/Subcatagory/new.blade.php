@extends('admin.dashboard.dash')
                @section('title','add catagory')
                @section('content')

                @if($errors)
                @foreach($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
  {{@$error}}
</div>
                @endforeach
                @endif

                                                            
                <form class="form" action=" {{route('subcatagory.store')}}" method="POST"
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

                                                         <div class="row">
                                                         <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> القسم الرئيسي </label>
                                                            <select name="maincatagory_id" class="select2 form-control">
                                                                <optgroup label="من فضلك أختر القسم ">
                                                                    @if($catagories && $catagories -> count() > 0)
                                                                        @foreach($catagories as $catagory)
                                                                            <option
                                                                                value="{{$catagory -> id }}">{{$catagory -> name}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </optgroup>
                                                            </select>
                                                                   @error('maincatagory_id')
                                                             <span class="text-danger">{{$message}}</span>
                                                             @enderror
                                                         </div>
</div>


                                                 

                                                        @foreach(active_languages() as $index=>$lang)
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{$lang->name}}  اسم القسم باللغة  </label>
                                                            <input type="text" value="" id="name"
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
                                                                   checked />
                                                            <label for="switcheryColor4"
                                                                   class="card-title ml-1">الحالة </label>

                                                            <span class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

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