@extends('admin.dashboard.dash')
@section('title','maincatagories')
@section('content')



<div class="card-body card-dashboard">
                                        <table
                                            class="table display nowrap table-striped table-bordered ">
                                            <thead>
                                            <tr>
                                                <th> الاسم</th>
                                                <th>الصورة</th>
                                                <th>اللغات الاخري </th>
                                                <th>الحالة</th>
                                                <th>الإجراءات</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                           
                                            @foreach($maincatagories as $maincatagory)
      <th scope="row">{{$maincatagory->name}}</th>
      <td><img src="{{asset($maincatagory->photo)}}" style="width:100px; height :100px"></td>
      <td>
<dl type="desc" >
    @foreach($maincatagory->translation as $lang)
    <dt>
    <span class="text-primary" style="font-weight:bold">{{$lang->local_lang}}</span>
    </dt>
    <dd> <span class="text-success" style="font-weight:bold">{{$lang->value}}</span> </dd>
</dl>
@endforeach
      </td>
      <td>{{$maincatagory->activator()}}</td>
      <td>
       <div class="btn-group" role="group"  aria-label="Basic example">
   <a href="{{route('edit_catagory',$maincatagory->id)}}" class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">تعديل</a>
 <a type="button" value="" onclick=""class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1"
       data-toggle="modal"
    data-target="#rotateInUpRight"  href="{{route('delete_catagory',$maincatagory->id)}}">
               حذف
</a>
<a type="button" value="" onclick=""class="btn btn-outline-success btn-min-width box-shadow-3 mr-1 mb-1"
       data-toggle="modal"
    data-target="#rotateInUpRight"  href="{{route('changeStatues',$maincatagory->id)}}">
           @if($maincatagory->active===0)    تفعيل

           @else
           انهاء التفعيل
           @endif

</a>

     </div>
  </td>
    </tr>
    @endforeach
                                                    
                                                


 </tbody>
     </table>

     <a href="{{route('admin.new.catagory')}}" class="btn btn-outline-success btn-min-width box-shadow-3 mr-1 mb-1">اضافة قسم جديد</a>
@endsection