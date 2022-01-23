@extends('admin.layouts.app')
@section('content')
<div class="">
  <h1 style=" color:rgb(151, 35, 35); text-align:center; font-size:50px;margin-top:20px"> الطلبات </h1>
        <div style="margin-bottom: 20px; margin-top:20px">
        <form  action="{{ route('search') }}"  method="get">
          <input type="text" name="search" placeholder="ابحث بالاسم" style="color:blue;">
          <button type="submit" class="btn btn-secondary" style="color: white;">{{ trans('admin.search') }}</button>
        </form>
        </div>
      <table  class="table table-bordered border-primary">



          <thead class="table-stripped">
              <tr style="text-align: center">
                
                  <th>transaction id</th>
                  <th >payment method</th>
                  <th >payment status</th>
                  <th>حالة التوصيل</th>
               
                  <th >status</th>
                  <th >Tracking id</th>
                  <th >created at</th>
                  <th >action</th>
              </tr>
              <tbody>
                  @foreach ($orders as $order )
                  <tr style="text-align: center">
                  <td>{{$order->transaction_id}}</td>
                  <td>{{$order->payment_method}}</td>
                  <td>{{$order->payment_status}}</td>
                  <td>{{$order->track}}</td>
                 
                  <td>
                     {{$order->status}}
                      {{-- <select class="form-control" name="status" id="">
                          <option value="pending">pending</option>
                          <option value="preparing">preparing</option>
                          <option value="in_route">in route</option>
                          <option value="canceled">canceled</option>
                          <option value="refound">refound</option>
                          <option value="completed">completed</option>
                      </select> --}}
                      
                     
                 </td>
                 <td>{{$order->tracking_id}}</td>
                  <td>{{$order->created_at	}}</td>
                 
                <td class="table-action">
                  <a href="{{route('order.details',$order->id)}}" class="btn btn-icon btn-outline-primary btn-sm" ><i class="fas fa-info-circle"></i></a>
                  <a href="#" class="btn btn-icon btn-outline-danger btn-sm" data-toggle="modal" data-target="#ModalDelete{{ $order->id }}"><i class="far fa-times-circle"></i> </a>


                    </td>
                    @include('modal.delete_order')

                  </tr>
                    @endforeach

              </tbody>
          </thead>
      </table>
      {{ $orders->links() }}
     </div>

<div>

@endsection
