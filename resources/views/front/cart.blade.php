<x-front-layout>

    <!-- breadcrumb -->
    <div class="container">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
            <a href="/" class="stext-109 cl8 hov-cl1 trans-04">
                الرئيسية
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <span class="stext-109 cl4">
                السلة
            </span>
        </div>
        @if (session()->has('success'))
            <div class="alert alert-success text-center w-75">
                <b>{{ session('success') }}</b>
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger text-center w-75">
                {{ session()->get('error') }}
            </div>
        @endif
    </div>


    <!-- Shoping Cart -->
    <form action="{{ route('checkout') }}" method="POST" class="bg0 p-t-75 p-b-85">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                    <div class="m-l-25 m-r--38 m-lr-0-xl">
                        <div class="wrap-table-shopping-cart">
                            <table class="table-shopping-cart">
                                <tr class="table_head">
                                    <th class="column-1">المنتج</th>
                                    <th class="column-2">الاسم</th>
                                    <th class="column-2">اللون</th>
                                    <th class="column-2">المقاس</th>
                                    <th class="column-3">السعر</th>
                                    <th class="column-4">الكمية</th>
                                    <th class="column-5">المجموع</th>

                                </tr>
                                @foreach ($carts as $cart)
                                    <input class="id" type="hidden" value="{{ $cart->product->id }}">

                                    <tr class="table_row">
                                        <td class="column-1">

                                            <div class="how-itemcart1">
                                                <a href="{{ route('cart.delete', $cart->product_id) }}">
                                                    <img src="{{ $cart->product->image_url }}" alt="IMG">
                                                </a>
                                                <a href="{{ route('cart.delete', $cart->product_id) }}"
                                                    class="btn btn-outline-danger mx-3 mt-3 position-absolute">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>

                                            </div>

                                        </td>
                                        <td class="column-2">{{ $cart->product->name }}</td>
                                        <td class="column-2">{{ $cart->color }}</td>
                                        <td class="column-2">{{ $cart->size }}</td>
                                        <td class="column-3">{{ $cart->product->final_price }} ر.س</td>
                                        <td class="column-4">

                                            <div class="wrap-num-product flex-w m-r-auto m-l-0">
                                                <div
                                                    class="update_quantity btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                    <i class="fs-16 zmdi zmdi-minus"></i>
                                                </div>
                                                <input class="quantity mtext-104 cl3 txt-center num-product"
                                                    type="number" min="1" name="quantity"
                                                    value="{{ $cart->quantity }}">

                                                <div
                                                    class="update_quantity btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                    <i class="fs-16 zmdi zmdi-plus"></i>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="productPrice column-5">
                                            {{ $cart->product->final_price * $cart->quantity }}
                                            ر.س</td>
                                    </tr>
                                @endforeach

                            </table>
                        </div>

                        <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                            <div class="flex-w flex-m m-r-20 m-tb-5">
                                <input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-l-10 m-tb-5" type="text"
                                    name="coupon" placeholder="كود الكوبون">

                                <div
                                    class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
                                    تطبيق الكوبون
                                </div>
                            </div>
                            <a href="{{ url('/cart') }}">
                                <div
                                    class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
                                    تحديث العربة
                                </div>
                            </a>
                        </div>
                        <h4 class="mtext-109 cl2 p-b-30">
                            الهدايا
                        </h4>
                        <div class="wrap-table-shopping-cart">
                            <table class="table-shopping-cart">
                                <tr class="table_head">
                                    <th class="column-1">الصورة</th>
                                    <th class="column-1">المنتج</th>

                                    <th class="column-3">السعر</th>


                                </tr>
                                @foreach ($gift_carts as $cart)
                                    <input class="id" type="hidden" value="{{ $cart->gift->id }}">
                                    @csrf
                                    <tr class="table_row">
                                        <td class="column-1">

                                            <div class="how-itemcart1">
                                                <a href="{{ route('cart.delete', $cart->gift_id) }}">
                                                    <img src="{{ $cart->gift->image_url }}" alt="IMG">
                                                </a>
                                                <a href="{{ route('cart.delete', $cart->gift_id) }}"
                                                    class="btn btn-outline-danger mx-3 mt-3 position-absolute">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>

                                            </div>

                                        </td>
                                        <td class="column-2">{{ $cart->gift->title }}</td>

                                        <td class="column-3">0 ر.س</td>


                                    </tr>
                                @endforeach

                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                    <div class="bor10 p-lr-40 p-t-30 p-b-40 m-r-63 m-l-40 m-lr-0-xl p-lr-15-sm">
                        <h4 class="mtext-109 cl2 p-b-30">
                            اجمالي العربة
                        </h4>

                        <div class="flex-w flex-t bor12 p-b-13">
                            <div class="size-209">
                                <span class="stext-110 cl2">
                                    المجموع الفرعي :
                                </span>
                            </div>

                            <div class="size-208">
                                <span class="totalPrice mtext-110 cl2">
                                    {{ $totalPrice }} ر.س
                                </span>
                            </div>
                        </div>

                        <div class="flex-w flex-t bor12 p-t-15 p-b-30">
                            <div class="size-208 w-full-ssm">
                                <span class="stext-110 cl2">
                                    تكلفة الشحن:
                                </span>
                            </div>

                            <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                                <p class="mtext-110 cl6 p-t-2 shipping-price">
                                    اختر المدينة أولاً
                                </p>

                                <div class="p-t-15">
                                    <span class="stext-112 cl8">
                                        عنوان الشحن
                                    </span>
                                    @error('name')
                                        <div>
                                            <span class="text-danger mt-2 mb-2">{{ $message }}</span>
                                        </div>
                                    @enderror
                                    <div class="bor8 bg0 m-b-12">
                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="name"
                                            placeholder="الاسم كامل" value="{{ old('name') }}">
                                    </div>
                                    @error('phone')
                                        <div>
                                            <span class="text-danger mt-2 mb-2">{{ $message }}</span>
                                        </div>
                                    @enderror
                                    <div class="bor8 bg0 m-b-12">
                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="phone"
                                            placeholder="رقم الجوال" value="{{ old('phone', session('phone')) }}">
                                    </div>
                                    @error('email')
                                        <div>
                                            <span class="text-danger mt-2 mb-2">{{ $message }}</span>
                                        </div>
                                    @enderror
                                    <div class="bor8 bg0 m-b-12">
                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="email" name="email"
                                            placeholder="البريد الالكتروني " value="{{ old('email') }}">
                                    </div>
                                    @error('city')
                                        <div>
                                            <span class="text-danger mt-2 mb-2">{{ $message }}</span>
                                        </div>
                                    @enderror
                                    <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
                                        <select class="js-select2 shipping_price" name="city">
                                            <option value="">اختر المدينة</option>
                                            @foreach ($cities as $city)
                                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                                            @endforeach

                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                    @error('street')
                                        <div>
                                            <span class="text-danger mt-2 mb-2">{{ $message }}</span>
                                        </div>
                                    @enderror
                                    <div class="bor8 bg0 m-b-12">
                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="street"
                                            placeholder="الشارع" value="{{ old('street') }}">
                                    </div>
                                    @error('postcode')
                                        <div>
                                            <span class="text-danger mt-2 mb-2">{{ $message }}</span>
                                        </div>
                                    @enderror
                                    <div class="bor8 bg0 m-b-22">
                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="postcode"
                                            placeholder="الرمز البريدي" value="{{ old('postcode') }}">
                                    </div>

                                    {{-- <div class="flex-w">
                                        <div
                                            class="flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer">
                                            تحديث المجموع
                                        </div>
                                    </div> --}}
                                    <hr>
                                    <div class="form-group">
                                        <h5 class="mb-3" >طريقة الدفع</h5>
                                        @error('payment_method')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                        <div class="form-check mb-3">
                                            <label for="credit_card" class="form-check-label">
                                                <input type="radio" class="form-check-input" name="payment_method" id="credit_card"
                                                    value="credit_card">
                                                البطاقة الائتمانية
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label for="cod" class="form-check-label">
                                                <input type="radio" class="form-check-input" name="payment_method"
                                                    id="cod" value="cod">
                                                الدفع عند الاستلام
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex-w flex-t p-t-27 p-b-33">
                            <div class="size-208">
                                <span class="mtext-101 cl2">
                                    المجموع :
                                </span>
                            </div>

                            <div class="size-209 p-t-1">
                                <span class="mtext-110 cl2 grand_total">
                                    {{ $totalPrice }} ر.س
                                </span>
                            </div>
                        </div>

                        <button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                            اكمال الطلب
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @push('js')
        <script>
            $(".update_quantity,.quantity").on("click change keyup", function() {
                var quantity = $(".quantity").val();
                var id = $(".id").val();
                var city_id = $('.shipping_price').val();
                console.log(id);
                console.log(quantity);

                $.ajax({
                    url: 'update-quantity',
                    type: 'POST', // http method
                    data: {
                        id: id,
                        quantity: quantity,
                        city_id: city_id,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    }, // data to submit

                    success: function(data, status, xhr) { // after success your get data
                        console.log(data);
                        $(".totalPrice").text("");
                        $(".totalPrice").html(data['totalPrice'] + "ر.س");
                        $(".productPrice").text("");
                        $(".productPrice").html(data['cart']['product']['final_price'] * data['cart'][
                            'quantity'
                        ] + "ر.س");
                        $(".grand_total").html(data.grand_total + " ر.س")

                    },
                    error: function(jqXhr, textStatus, errorMessage) { // if any error come then

                    }
                });
            })
        </script>
        <script>
            $(document).ready(function() {
                $('.shipping_price').change(function() {
                    var id = $(this).val();
                    var data = {
                        "_token": "{{ csrf_token() }}",
                        "id": id
                    }
                    $.post('shipping-price', data)
                        .done(function(result) {
                            console.log(result);
                            $(".shipping-price").html(result.shipping_price + " ر.س");
                            $(".grand_total").html(result.grand_total + " ر.س");
                        })
                        .fail(function(error) {
                            console.log(error.responseJSON.message);
                            $(".shipping-price").html("اختر المدينة أولاً");
                            $(".grand_total").html(error.responseJSON.grand_total + " ر.س");
                        });
                });
            });
        </script>
    @endpush



</x-front-layout>
