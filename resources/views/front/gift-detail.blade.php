<x-front-layout>

    <!-- Content page -->
    <section class="bg0 p-t-52 p-b-20">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-9 p-b-80">
                    <div class="p-r-45 p-r-0-lg">
                        <!--  -->
                        <div class="wrap-pic-w how-pos5-parent">
                            <img src="{{asset($gift->image_url)}}" alt="IMG-BLOG">

                        </div>

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
                               الملابس الهدية :
                            </h5>

                           <div class="row">

                            <div class="col-sm-6 col-md-4  p-b-35 isotope-item ">
                                <!-- Block2 -->
                                <a href="{{ route('product.details', $gift->product->slug) }}">
                                <div class="block2">
                                    <div class="block2-pic hov-img0">
                                        <img src="{{ $gift->product->image_url }}" alt="IMG-PRODUCT">
                                    </div>

                                    <div class="block2-txt flex-w flex-t p-t-14">
                                        <div class="block2-txt-child1 flex-col-l ">
                                            <a href="{{ route('product.details', $gift->product->slug) }}"
                                                class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                                {{ $gift->product->name }}
                                            </a>

                                            <span class="stext-105 cl3">
                                               <del> {{ $gift->product->price }} ر.س </del>
                                            </span>
                                        </div>

                                        <div class="wishlist block2-txt-child2 flex-r p-t-3">
                                            @csrf
                                            <input class="product_id" name="product_id" type="hidden"
                                                value="{{ $gift->product->id }}">
                                            <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">

                                                <img class="icon-heart1 dis-block trans-04"
                                                    src="{{ asset('front/images/icons/icon-heart-01.png') }}" alt="ICON">
                                                <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                                    src="{{ asset('front/images/icons/icon-heart-02.png') }}" alt="ICON">
                                            </a>
                                        </div>
                                    </div>
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

</x-front-layout>
