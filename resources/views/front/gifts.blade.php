<x-front-layout>

    <!-- Title page -->
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('/front/images/bg-02.jpg');">
        <h2 class="ltext-105 cl0 txt-center">
            الهدايا 
        </h2>
    </section>


    <!-- Content page -->
    <section class="bg0 p-t-62 p-b-60">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-9 p-b-80">
                    <div class="p-r-45 p-r-0-lg">
                        @foreach ($gifts as $gift)
                            <!-- item gift -->
                            <div class="p-b-63">
                                <a href="{{route('gift.details',$gift->id)}}" class="hov-img0 how-pos5-parent">
                                    <img src="{{ asset($gift->image_url) }}" alt="IMG-BLOG">
                                </a>

                                <div class="p-t-32">
                                    <h4 class="p-b-15">
                                        <a href="{{route('gift.details',$gift->id)}}" class="ltext-108 cl2 hov-cl1 trans-04">
                                            {{ $gift->title }}
                                        </a>
                                    </h4>

                                    <p class="stext-117 cl6">
                                        {!! $gift->details !!}
                                    </p>

                                    <div class="flex-w flex-sb-m p-t-18">

                                        <a href="{{route('gift.details',$gift->id)}}" class="stext-101 cl2 hov-cl1 trans-04 m-tb-10">
                                            <i class="fa fa-long-arrow-left m-l-9"></i>
                                            مزيد من التفاصيل
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <!-- Pagination -->
                        <div class="flex-l-m flex-w w-full p-t-10 m-lr--7">
                            <a href="#" class="flex-c-m how-pagination1 trans-04 m-all-7 active-pagination1">
                                1
                            </a>

                            <a href="#" class="flex-c-m how-pagination1 trans-04 m-all-7">
                                2
                            </a>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>



</x-front-layout>
