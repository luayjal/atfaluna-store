
@extends('admin.layouts.app')
@section('content')
<div class="card">
    <div style="background-color:lavender" class="card-header">

        <h1 style=" color:rgb(151, 35, 35); text-align:center; font-size:50px;margin-top:20px">{{ trans('admin.order details') }} </h1>
    </div>
<div>
    
    <div  class="card-body">
        @if (session()->has('success'))
        <div class="alert alert-success text-center mt-4">
            {{session()->get('success')}}
        </div>
        @endif
        @if (session()->has('status'))
       
             {!!session()->get('status')!!}
        
        @endif
        <h4 class="text-center mt-5"> معلومات المشتري</h4>
        <table class="table text-center">
            <tr>
                <th >الاسم</th>
                  <th >الايميل </th>
                  <th >الهاتف </th>
                  <th >الدولة </th>
               
            </tr>
          
        
            <tr>
                <td>{{$order->customer->fname." ". $order->customer->lname}}</td>
                  <td>{{$order->customer->email}}</td>
                  <td>{{$order->customer->phone}}</td>
                  <td>{{$order->customer->country}}</td>
                 
            </tr>

        </table>
        <h4 class="text-center mt-5">تفاصيل منتجات الطلب</h4>
        <table class="table text-center">
            <tr>
                <th>الاسم</th>
                <th>الكمية</th>
                <th>السعر</th>
                <th>المجموع</th>
                <th></th>
                <th></th>
            </tr>
            @foreach ($order->orderProduct as $product)
            <tr>
                <th>
                    <p>{{$product->product->name_ar}}</p>
                </th>
                <th>
                    <p>
                        {{$product->quantity}}
                    </p>
                </th>
             
                <th>
                    <p class="">
                        {{$product->price}}
                    </p> 
                </th>
                <th>
                   <p>
                        {{$product->total}}
                   </p>
                </th>
                
            </tr>
            @endforeach
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th>{{$order->subtotal}}</th>
            </tr>

        </table>

        <h4 class="text-center mt-5">تفاصيل الطلب</h4>
        <table class="table text-center">
            <tr>
                <th >كود الخصم</th>
                  <th >مجموع المنتجات</th>
                  <th >قيمة الخصم</th>
                  <th >تكلفة الشحن</th>
                  <th >المجموع الكلي</th>
            </tr>
          
        
            <tr>
                <td>{{$order->coupon->code??''}}</td>
                  <td>{{$order->subtotal}}</td>
                  <td>{{$order->total_discount}}</td>
                  <td>{{$order->delivery}}</td>
                  <td>{{ $order->grandtotal}}</td>
            </tr>

        </table>
        
        <a  class="btn btn-outline-success " href="{{route('order.shipping',$order->id)}}" >
            <i class="fas fa-truck"></i> شحن
       </a>
       @if ($order->tracking_id)
       <a  class="btn btn-warning " href="{{route('order.get.label',$order->tracking_id)}}" >
        <i class="fas fa-file"></i> احصل على الملصق </a>
       
        <a class="btn btn-outline-danger" href="{{route('cancel.order',$order->tracking_id)}}"> <i class="fas fa-trash"></i> الغاء</a>
        @endif
    </div>


@endsection
