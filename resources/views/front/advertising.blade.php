<x-front-layout>

    <!-- Title page -->
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('/front/images/bg-02.jpg');">
        <h2 class="ltext-105 cl0 txt-center">
            عروض الفيديو
        </h2>
    </section>


    <!-- Content page -->
    <section class="bg0 p-t-62 p-b-60">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-12 p-b-80">
                    <div class="p-r-45 p-r-0-lg">
                        <div class="row">
                            @foreach ($advertisings as $advertising)
                            <!-- item gift -->
                            <div class="col-md-6 p-b-63">
                                <a href="javascript:void(0);" class="hov-img0 how-pos5-parent">

                                    <video src="{{ asset($advertising->video_url) }}" controls class="w-100" alt="IMG-BLOG">

                                </a>
                                <div class="p-t-32">

                                    <div class="flex-w flex-sb-m p-t-18">

                                        <a href="{{route('product.details',$advertising->product->slug)}}" class="stext-101 cl2 hov-cl1 trans-04 m-tb-10">
                                            <i class="fa fa-long-arrow-left m-l-9"></i>
                                            عرض المنتج
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>


                        <!-- Pagination -->
                        <div class="flex-l-m flex-w w-full p-t-10 m-lr--7">
                           {{$advertisings->links()}}
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>



</x-front-layout>
