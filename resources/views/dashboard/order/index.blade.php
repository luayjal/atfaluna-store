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

                            <th>transaction id</th>
                            <th>حالة الدفع</th>
                            <th>حالة التوصيل</th>
                            <th>المجموع الفرعي</th>
                            <th>تكلفة الشحن</th>
                            <th>المجموع الكلي</th>
                            <th>تاريخ الانشاء</th>
                            <th>#</th>
                        </tr>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr style="text-align: center">
                                <td>{{ $order->transaction_id }}</td>
                                <td>{{ $order->payment_status }}</td>
                                <td>{{ $order->payment_status }}</td>
                                <td>{{ $order->subtotal }}</td>
                                <td>{{ $order->shipping_price }}</td>
                                <td>{{ $order->grandtotal }}</td>

                                <td>{{ $order->created_at }}</td>

                                <td class="table-action">
                                    @can('view', $order)
                                        <a href="{{ route('admin.orders.eval', $order->id) }}"
                                            class="btn btn-icon btn-outline-warning btn-sm"><i class="fas fa-star"></i></i></a>
                                    @endcan
                                    @can('view', $order)
                                        <a href="{{ route('admin.orders.details', $order->id) }}"
                                            class="btn btn-icon btn-outline-primary btn-sm"><i
                                                class="fas fa-info-circle"></i></a>
                                    @endcan
                                    @can('delete', $order)
                                        <a href="#" class="btn btn-icon btn-outline-danger btn-sm" data-toggle="modal"
                                            data-target="#ModalDelete{{ $order->id }}"><i
                                                class="far fa-times-circle"></i> </a>
                                    @endcan
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
