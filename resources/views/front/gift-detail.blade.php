<x-front-layout>

    <!-- Content page -->
    <section class="bg0 p-t-52 p-b-20">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-9 p-b-80">
                    <div class="p-r-45 p-r-0-lg">
                        <!--  -->
                        {{-- <div class="wrap-pic-w how-pos5-parent">
                            <img src="{{asset($gift->image_url)}}" alt="IMG-BLOG">

                        </div> --}}

                        <div class="p-t-32">

                            <h4 class="ltext-109 cl2 p-b-28">
                                {{$gift->title}}
                            </h4>

                            <p class="stext-117 cl6 p-b-26">
                              {!! $gift->details !!}
                            </p>


                        </div>


                        <!--  -->
                        <div class="p-t-40">
                            <h5 class="mtext-113 cl2 p-b-12">
                               صورة الهدية :
                            </h5>
                            @foreach ( $errors->all() as $message)
                            <ul>
                                <li>
                                    <div class="alert alert-danger" role="alert">
                                        <strong>{{$message}}</strong>
                                    </div>
                                </li>
                            </ul>
                            @endforeach
                            @if (session()->has('error'))
                            <div class="alert alert-danger" role="alert">
                                <strong>{{session('error')}}</strong>
                            </div>
                            @endif
                            @if (session()->has('success'))
                            <div class="alert alert-success" role="alert">
                                <strong>{{session('success')}}</strong>
                            </div>
                            @endif
                           <div  class="row">

                            <div class="col-sm-6 col-md-4  p-b-35 isotope-item ">
                                <!-- Block2 -->
                                <a href="#">
                                <div class="block2">
                                    <div class="block2-pic hov-img0">
                                        <img src="{{ $gift->image_url }}" alt="IMG-PRODUCT">
                                    </div>

                                    <div class="block2-txt flex-w flex-t p-t-14">
                                        <div class="block2-txt-child1 flex-col-l ">
                                            <a href="#"
                                                class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                                {{ $gift->title }}
                                            </a>

                                            <span class="stext-105 cl3">
                                               <del> {{ $gift->price }} ر.س </del>
                                            </span>
                                        </div>

                                        <div class="wishlist block2-txt-child2 flex-r p-t-3">
                                            @csrf
                                            <input class="product_id" name="product_id" type="hidden"
                                                value="{{ $gift->id }}">
                                            <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">

                                                <img class="icon-heart1 dis-block trans-04"
                                                    src="{{ asset('front/images/icons/icon-heart-01.png') }}" alt="ICON">
                                                <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                                    src="{{ asset('front/images/icons/icon-heart-02.png') }}" alt="ICON">
                                            </a>
                                        </div>
                                    </div>
                                    <button type="button" data-toggle="modal" data-target="#modal_cart"
                                    class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 ">{{-- js-addcart-detail --}}
                                    أضف الى العربة
                                    </button>
                                </div>
                                </a>
                            </div>

                           </div>


                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
    <div class="modal fade  mt-5"  id="modal_cart" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">الاضافة للعربة</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('add.gift')}}" method="post">
                    @csrf
                <div class="modal-body">
                    <div class="alert alert-danger d-none msg-error">
                        <ul>

                        </ul>
                    </div>
                    <input class="gift_id" name="gift_id" type="hidden"
                    value="{{ $gift->id }}">
                    <div class="form-group">
                        <label for="">ادخل رقم الهاتف</label>
                        <input dir="ltr" type="text" class="form-control phone" name="phone" id=""
                            aria-describedby="helpId" placeholder="رقم الجوال"
                            value="{{ old('phone', session('phone')) }}">
                        {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
                    </div>
                    <div class="form-group">
                        <label for="">ادخل كود الهدية</label>
                        <input dir="ltr" type="text" class="form-control code" name="code" id=""
                            aria-describedby="helpId" placeholder="الكود"
                            value="{{ old('phone', session('phone')) }}">
                        {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                    <button  class="btn btn-primary">اضف للعربة</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</x-front-layout>
