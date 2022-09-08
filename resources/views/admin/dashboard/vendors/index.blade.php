@extends('admin.dashboard.dash')
@section('title','vendors')
@section('content')

<div class="card-body card-dashboard">
                                        <table
                                            class="table display nowrap table-striped table-bordered ">
                                            <thead>
                                            <tr>
                                                <th> الاسم</th>

                                                <th>رقم الهاتف</th>
                                                <th>القسم الخاص بالتاجر</th>
                                                
                                                
                                                <th> الشعار </th>
                                            
                                                    <th>البريدالالكتروني  </th>
                                                    <th>العنوان </th>
                                                    <th>الحالة</th>
                                                    <th>الاجراءات</th>


                                           
                                            </tr>
                                            </thead>
                                            <tbody>

                                           
                         @foreach($vendors as $index=> $vendor)
                         <tr>
      <th scope="row">{{$vendor->name}} </th>
      
      <td>{{$vendor->phone_number}}</td>
      <td>{{$vendor->mainCatagory->name}}</td>
      <td><img src="{{asset($vendor->logo)}}" style="width:100px;height:100px"></td>
      
      <td>{{$vendor->email}}</td>
      <td>{{$vendor->address}}</td>
      <td>{{$vendor->activator()}}</td>

                                             
    <td>
       <div class="btn-group" role="group"  aria-label="Basic example">
   <a href="{{route('vendor.edit',$vendor->id)}}" class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">تعديل</a>

   <form action="{{route('vendor.destroy',$vendor->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1"  data-toggle="modal"
    data-target="#rotateInUpRight"> حذف</button>
                                </form>

                                <a href="{{route('vendor.changeStatues',$vendor->id)}}" class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1"
                                >
                                @if($vendor->active===0)
                                تفعيل


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

     <a href="{{route('vendor.create')}}" class="btn btn-outline-success btn-min-width box-shadow-3 mr-1 mb-1">اضافة تاجر جديد</a>
@endsection