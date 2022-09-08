@extends('admin.dashboard.dash')
@section('title','languages')
@section('content')

<div class="card-body card-dashboard">
                                        <table
                                            class="table display nowrap table-striped table-bordered ">
                                            <thead>
                                            <tr>
                                                <th> الاسم</th>
                                                <th>الاختصار</th>
                                                <th>اتجاه</th>
                                                <th>الحالة</th>
                                                <th>الإجراءات</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                           
                                            @foreach($languages as $lang)
      <th scope="row">{{$lang->name}}</th>
      <td>{{$lang->abbr}}</td>
      <td>{{$lang->direction}}</td>
      <td>{{$lang->activator()}}</td>
      <td>
       <div class="btn-group" role="group"  aria-label="Basic example">
   <a href="{{route('edit.language',$lang->id)}}" class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">تعديل</a>
 <a type="button value="" onclick=""class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1"
       data-toggle="modal"
    data-target="#rotateInUpRight"  href="{{route('delete.language',$lang->id)}}">
               حذف
</a>

     </div>
  </td>
    </tr>
    @endforeach
                                                    
                                                


 </tbody>
     </table>

     <a href="{{route('admin.new.language')}}" class="btn btn-outline-success btn-min-width box-shadow-3 mr-1 mb-1">اضافة لغة جديدة</a>
@endsection