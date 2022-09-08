@extends('admin.dashboard.dash')
                @section('title','edit lang')
                @section('content')
                <form class="form" action="{{route('update.language',$language->id)}}" method="POST"
                                              enctype="multipart/form-data">

                                         @csrf

                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-home"></i> بيانات  اللغة </h4>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> اسم اللغة </label>
                                                            <input type="text" value="{{$language->name}}" id="name"
                                                                   class="form-control"
                                                                   placeholder="ادخل اسم اللغة  "
                                                                   name="name">
                                                                   @error('name')
                                                             <span class="text-danger">{{$message}}</span>
                                                             @enderror
                                                         </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> أختصار اللغة </label>
                                                            <input type="text" value="{{$language->abbr}}" id="name"
                                                                   class="form-control"
                                                                   placeholder="ادخل أختصار اللغة6"
                                                                   name="abbr">
                                                                   @error('abbr')
                                                             <span class="text-danger">{{$message}}</span>
                                                             @enderror
                                                         </div>
                                                    </div>
                                                </div>



                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput2"> الاتجاة </label>
                                                            <select name="direction" class="select2 form-control">
                                                                <optgroup label="من فضلك أختر اتجاه اللغة ">
                                                                    <option value="rtl" @if($language->direction =='rtl') selected @endif>من اليمين الي اليسار</option>
                                                                    <option value="ltr" @if($language->direction =='ltr') selected @endif>من اليسار الي اليمين</option>
                                                                </optgroup>
                                                            </select>
                                                            @error('direction')
                                                             <span class="text-danger">{{$message}}</span>
                                                             @enderror
                                                         </div>
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group mt-1">
                                                            <input type="checkbox"  value="1" name="active"
                                                                   id="switcheryColor4"
                                                                   class="switchery" data-color="success"
                                                                 @if($language->activator()==="مفعل")  checked @endif/>
                                                            <label for="switcheryColor4"
                                                                   class="card-title ml-1">الحالة </label>

                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


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