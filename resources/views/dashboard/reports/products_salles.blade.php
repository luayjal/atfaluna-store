@extends('admin.layouts.app')
@section('content')
<div dir="rtl" class="">
  <h1 style=" color:rgb(151, 35, 35); text-align:center; font-size:38px;margin-top:20px"> تقرير  العبائات التي نفذت </h1>
  <hr>
 
  
      <table  dir="rtl"  class="table table-bordered border-primary"  style="margin-bottom: 20px; margin-top:20px">
          <thead class="table-stripped">
            <tr style="text-align: center">
                  <th>صورة العبائة</th>
                  <td>الاسم</td>
                  <td>اجمالي الكمية</td>
                  <td>عدد الطلبات</td>
                  <td>اجمالي المجموع</td>
             
              </tr>
              @foreach ($products as $product)
              <tr style="text-align: center">
                <td><img width="88px" height="91px" src="{{asset('assets/uploads/product/' . $product->image_ar)}}"></td>
                <td>{{$product->name_ar}}</td>
                <td>{{$product->sumQuantity}}</td>
                <td>{{$product->countQuantity}}</td>
                <td>{{$product->totalSales}}</td>
              </tr> 
              @endforeach
           
             
              
      </table>
     
     </div>

<div>

@endsection
