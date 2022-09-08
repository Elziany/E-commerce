@extends('admin.dashboard.dash')
@section('title','products')
@section('content')



<div class="card-body card-dashboard">
                                        <table
                                            class="table display nowrap table-striped table-bordered ">
                                            <thead>
                                            <tr>
                                                <th> الاسم</th>
                                                <th>الصورة</th>
                                                <th>الوصف</th>
                                                <th>السعر</th>
                                                <th>اللغات الاخري </th>
                                                <th>الحالة</th>
                                                <th>الإجراءات</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                           
                                            @foreach($products as $product)
      <th scope="row">{{$product->name}}</th>
      <td><img src="{{asset($product->image)}}" style="width:100px; height :100px"></td>
         <td>{{$product->description}}</td>
         <td>{{$product->price}}</td>
      <td>
<dl type="desc" >
    @foreach($product->translation as $lang)
    <dt>
    <span class="text-primary" style="font-weight:bold">{{$lang->local_lang}}</span>
    </dt>
    <dd> <span class="text-success" style="font-weight:bold">{{$lang->value}}</span> </dd>
</dl>
@endforeach
      </td>
      <td>{{$product->activator()}}</td>
      <td>
       <div class="btn-group" role="group"  aria-label="Basic example">
   <a href="{{route('product.edit',$product->id)}}" class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">تعديل</a>
 <a type="button" value="" onclick=""class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1"
       data-toggle="modal"
    data-target="#rotateInUpRight"  href="">
               حذف
</a>
<a type="button" value="" onclick=""class="btn btn-outline-success btn-min-width box-shadow-3 mr-1 mb-1"
       data-toggle="modal"
    data-target="#rotateInUpRight"  href="">
           @if($product->active===0)    تفعيل

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

     <a href="{{route('product.new')}}" class="btn btn-outline-success btn-min-width box-shadow-3 mr-1 mb-1">اضافة منتج جديد</a>
@endsection