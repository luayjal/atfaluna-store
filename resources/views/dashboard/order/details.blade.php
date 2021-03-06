<x-dashboard-layout header="الطلبات">

    <div class="card">
        <div style="background-color:lavender" class="card-header">

            <h1 style=" color:rgb(151, 35, 35); text-align:center; font-size:50px;margin-top:20px">تفاصيل الطلب </h1>
        </div>
        <div>

            <div class="card-body">
                @if (session()->has('status'))
                    @if (session()->get('status') == 201)
                        <div class="alert alert-success text-center mt-4">
                            تم ارسال الطلب بنجاح
                        </div>
                    @elseif(session()->get('status') == 302)
                        <div class="alert alert-success text-center mt-4">
                            تم ارسال الطلب مسبقاً
                        </div>
                    @endif
                @endif

                @if (session()->has('status'))
                    <div class="alert alert-success text-center mt-4">
                        {!! session()->get('status') !!}
                    </div>
                @endif
                <h4 class="text-center mt-5"> معلومات المشتري</h4>
                <table class="table text-center">
                    <tr>
                        <th>الاسم</th>
                        <th>الايميل </th>
                        <th>الهاتف </th>
                        <th>العنوان </th>

                    </tr>


                    <tr>
                        <td>{{ $order->customer->name }}</td>
                        <td>{{ $order->customer->email }}</td>
                        <td>{{ $order->customer->phone }}</td>
                        <td>{{ $order->customer->address }}</td>

                    </tr>

                </table>
                @if ($products)

                    <h4 class="text-center mt-5">تفاصيل منتجات الطلب</h4>
                    <table class="table text-center">
                        <tr>
                            <th></th>
                            <th>كود المنتج</th>
                            <th>الاسم</th>
                            <th>المقاس</th>
                            <th>اللون</th>
                            <th>الكمية</th>
                            <th>السعر</th>
                            <th>المجموع</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach ($products as $item)
                            <tr>
                                <th>
                                    <p><img src="{{ asset($item->product->image_url) }}" width="60px" alt=""></p>
                                </th>
                                <th>
                                    <p>{{ $item->variant->code_variant }}</p>
                                </th>
                                <th>
                                    <p>{{ $item->product->name }}</p>
                                </th>

                                <th>
                                    <p>{{ size($item->variant_id) }}</p>
                                </th>
                                <th>
                                    <p>{{ color($item->variant_id) }}</p>
                                </th>
                                <th>
                                    <p>
                                        {{ $item->quantity }}
                                    </p>
                                </th>

                                <th>
                                    <p class="">
                                        {{ $item->price }}
                                    </p>
                                </th>
                                <th>
                                    <p>
                                        {{ $item->total }}
                                    </p>
                                </th>

                            </tr>
                        @endforeach
                        <tr>
                            <th>المجموع الكلي للمنتجات</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>{{ $order->subtotal }}</th>
                        </tr>

                    </table>
                @endif
                @if ($gifts)
                    <h4 class="text-center mt-5">الهدايا</h4>
                    <table class="table text-center">
                        <tr>
                            <th></th>
                            <th>كود الهدية</th>
                            <th>الاسم</th>

                        </tr>
                        @foreach ($gifts as $item)
                            <tr>
                                <th>
                                    <p><img src="{{ asset($item->gift->image_url) }}" width="60px" alt=""></p>
                                </th>
                                <th>
                                    <p>{{ $item->gift->code }}</p>
                                </th>
                                <th>
                                    <p>{{ $item->gift->title }}</p>
                                </th>

                            </tr>
                        @endforeach

                    </table>
                @endif
                <h4 class="text-center mt-5">تفاصيل الطلب</h4>
                <table class="table text-center">
                    <tr>
                        <th>كود الخصم</th>
                        <th>قيمة الخصم</th>
                        <th>مجموع المنتجات</th>
                        <th>تكلفة الشحن</th>
                        <th>المجموع الكلي</th>
                    </tr>


                    <tr>
                        <td>{{ $order->coupon->code ?? 'لا يوجد' }}</td>
                        <td>{{ $order->total_discount ?? 'لا يوجد' }}</td>
                        <td>{{ $order->subtotal }}</td>
                        <td>{{ $order->shipping_price }}</td>
                        <td>{{ $order->grandtotal }}</td>
                    </tr>

                </table>
            </div>

</x-dashboard-layout>
