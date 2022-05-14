<x-dashboard-layout header="الطلبات">

    <div class="content">
        <div class="container">

            <div class="">
                <h1 style=" color:rgb(151, 35, 35); text-align:center; font-size:50px;margin-top:20px"> الطلبات </h1>
                <div style="margin-bottom: 20px; margin-top:20px">
                    <form action="{{-- route('search') --}}" method="get">
                        <input type="text" name="search" placeholder="ابحث بالاسم" style="color:blue;">
                        <button type="submit" class="btn btn-secondary" style="color: white;">بحث</button>
                    </form>
                </div>
                <table class="table table-bordered border-primary">



                    <thead class="table-stripped">
                        <tr style="text-align: center">

                            <th>رقم العملية</th>
                            <th>طريقة الدفع</th>
                            <th>حالة الدفع</th>
                            <th>حالة الطلب</th>
                            <th>المجموع الفرعي</th>
                            <th>تكلفة الشحن</th>
                            <th>المجموع الكلي</th>
                            <th>تاريخ الانشاء</th>
                            <th>الاجراءات</th>
                        </tr>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr style="text-align: center">
                                <td>{{ $order->transaction_id }}</td>
                                <td>{{ __($order->payment_method) }}</td>
                                <td>
                                    <p
                                        class="p-2 rounded-lg @if ($order->payment_status == 'paid') border border-success text-success @elseif ($order->payment_status == 'unpaid')border border-danger text-danger @endif">
                                        {{ __($order->payment_status) }}

                                    </p>

                                </td>
                                <td>{{ __($order->status) }}</td>
                                <td>{{ $order->subtotal }}</td>
                                <td>{{ $order->shipping_price }}</td>
                                <td>{{ $order->grandtotal }}</td>

                                <td>{{ $order->created_at->toDateString() }}</td>

                                <td class="table-action">
                                    <div class="form-group">
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-info dropdown-toggle" type="button"
                                                id="triggerId" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                الاجراءات
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="triggerId">
                                                @can('view', $order)
                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.orders.eval', $order->id) }}"> <i
                                                            class="fas fa-star btn-outline-warning btn-sm"></i>رابط
                                                        التقييم</a>
                                                @endcan
                                                @can('view', $order)
                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.orders.details', $order->id) }}"><i
                                                            class="fas fa-info-circle btn-outline-primary btn-sm"></i> عرض
                                                        التفاصيل</a>
                                                @endcan
                                                @can('delete', $order)
                                                    <a class="dropdown-item" href="#" data-toggle="modal"
                                                        data-target="#CancelModal_{{$order->id}}"><i
                                                            class="far fa-times-circle btn-outline-danger btn-sm"></i> الغاء
                                                        الطلب
                                                    </a>
                                                @endcan

                                            </div>
                                        </div>

                                    </div>
                                     <!-- Modal -->
                                        <div class="modal fade" id="CancelModal_{{$order->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">الغاء لطلب </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        هل أنت متأكد من الغاء الطلب
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                                                        <form action="{{route('admin.order.cancel',$order->id)}}" method="post">
                                                            @csrf
                                                            <button  class="btn btn-danger">الغاء</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                    </thead>
                </table>
                {{ $orders->links() }}
            </div>



        </div>
    </div>

</x-dashboard-layout>
