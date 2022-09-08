@extends('admin.dashboard.dash')
@section('title','subcatagories')
@section('content')



<div class="card-body card-dashboard">
                                        <table
                                            class="table display nowrap table-striped table-bordered ">
                                            <thead>
                                            <tr>
                                                <th> الاسم</th>
                                                <th>الصورة</th>
                                                <th>اللغات الاخري </th>
                                                <th>القسم الرئيسي</th>
                                                <th>الحالة</th>
                                                <th>الإجراءات</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                           
                                            @foreach($subcatagories as $subcatagory)
      <th scope="row">{{$subcatagory->name}}</th>
      <td><img src="{{asset($subcatagory->image)}}" style="width:100px; height :100px"></td>
      <td>
<dl type="desc" >
    @foreach($subcatagory->translation as $index=>$lang)
    <dt>
    <span class="text-primary" style="font-weight:bold">{{++$index}}-{{$lang->local_lang}}</span>
    </dt>
    <dd> <span class="text-success" style="font-weight:bold">{{$lang->value}}</span> </dd>
</dl>
@endforeach
      </td>


      <th scope="row">{{$subcatagory->maincatagory->name}}</th>
      
      
      
      <td>{{$subcatagory->activator()}}</td>
      <td>
       <div class="btn-group" role="group"  aria-label="Basic example">
   <a href="{{route('edit.subcatagory',$subcatagory->id)}}" class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">تعديل</a>
 <a type="button" value="" onclick=""class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1"
       data-toggle="modal"
    data-target="#rotateInUpRight"  href="{{route('delete.subcatagory',$subcatagory->id)}}">
               حذف
</a>
<a type="button" value="" onclick=""class="btn btn-outline-success btn-min-width box-shadow-3 mr-1 mb-1"
       data-toggle="modal"
    data-target="#rotateInUpRight"  href="{{route('change.subcatagory',$subcatagory->id)}}">
           @if($subcatagory->active===0)    تفعيل

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

     <a href="{{route('new.subcatagory')}}" class="btn btn-outline-success btn-min-width box-shadow-3 mr-1 mb-1">اضافة قسم فرعي جديد</a>
@endsection