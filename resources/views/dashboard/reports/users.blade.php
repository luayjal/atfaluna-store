@extends('admin.layouts.app')
@section('content')



<div class="">
    
        <table class="table ">
                <h1 style=" color:rgb(151, 35, 35); text-align:center; font-size:50px; margin-bottom:50px"> {{trans('admin.Users')}} </h1>
                
                <div style="margin-bottom: 20px; margin-top:20px">
                    <form  action="{{ route('users') }}"  method="get">
                      <input class="form-control w-25 d-inline" type="text" name="search" placeholder="ابحث بالاسم أو الايميل أو الهاتف" style="color:blue;">
                      <button type="submit" class="btn btn-secondary" style="color: white;">{{ trans('admin.search') }}</button>
                    </form>
                </div>
            <tr style="color:#0d6efd;font-size:40;">
                <th >الاسم</th>
                  <th >الايميل </th>
                  <th >الهاتف </th>
                  <th >الدولة </th>
                  <th >عدد الطلبات</th>
                  <th >الحدث </th>

               
            </tr>
          
        @foreach($customers as $customer)
            <tr>
                <td>{{$customer->fname." ". $customer->lname}}</td>
                  <td>{{$customer->email}}</td>
                  <td>{{$customer->phone}}</td>
                  <td>{{$customer->country}}</td>
                  <td>{{$customer->order_count}}</td>
                   <td class="table-action">
                                    <a href="#" class="btn btn-icon btn-outline-danger btn-sm" data-toggle="modal" data-target="#ModalDelete{{ $customer->id }}"><i class="feather icon-trash-2"></i> </a>

                                </td>
                                 @include('modal.delete_users') 
            </tr>
        @endforeach
        </table>

        {{ $customers->links() }} 
    </div>
@endsection