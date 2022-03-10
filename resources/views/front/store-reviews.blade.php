<x-front-layout>

    <!-- Title page -->
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('');">
        <h2 class="ltext-105 cl0 text-center text-dark ml-5">
             التقييمات
        </h2>
    </section>


    <!-- Content page -->
    <section class="bg0 p-t-62 p-b-60">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-9 p-b-80">
                    <div class="p-r-45 p-r-0-lg">
<!-- Tab panes -->
<div class="tab-content p-t-43">


    <!-- - -->
    <div >
        <div class="row">
            <div class="col-sm-10 col-md-8  m-lr-auto">
                <div class="p-b-30 m-lr-15-sm">
                    @foreach ($reviews as $review)
                    <!-- Review -->
                    <div class="flex-w flex-t p-b-68">
                        <div class="wrap-pic-s size-109 bor0 of-hidden m-l-18 m-t-6">
                            <img src="{{$review->avatar}}" alt="AVATAR">
                        </div>

                        <div class="size-207">
                            <div class="flex-w flex-sb-m p-b-17">
                                <span class="mtext-107 cl2 p-l-20">
                                   {{$review->name}}
                                </span>

                                <span class="fs-18 cl11">
                                    @for ($i=1; $i<=$review->rating;$i++)
                                    <i class="zmdi zmdi-star"></i>
                                    @endfor

                                </span>
                            </div>

                            <p class="stext-102 cl6">
                                {{$review->review}}
                            </p>
                        </div>
                    </div>
                    @endforeach
                    <div class="flex-l-m flex-w w-full p-t-10 m-lr--7 mb-4 mt-2">
                      {{$reviews->links()}}
                    </div>
                    <!-- Add review -->
                    <form action="{{route('store-reviews')}}" method="post" class="w-full">
                        @csrf
                        <h5 class="mtext-108 cl2 p-b-7">
                            أضف مراجعتك
                        </h5>

                        <p class="stext-102 cl6">

                            عنوان البريد الالكتروني ليس اجباري. الحقول الاجبارية عليها علامة (*)
                        </p>

                        <div class="flex-w flex-m p-t-50 p-b-23">
                            <span class="stext-102 cl3 m-l-16">
                                تقييمك
                            </span>

                            <span class="wrap-rating fs-18 cl11 pointer">
                                <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                <input class="dis-none" type="number" name="rating">
                            </span>
                        </div>

                        <div class="row p-b-25">
                            <div class="col-12 p-b-5">
                                <label class="stext-102 cl3" for="review">مراجعتك</label>
                                <textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10" id="review" name="review"></textarea>
                            </div>

                            <div class="col-sm-6 p-b-5">
                                <label class="stext-102 cl3" for="name">الاسم</label>
                                <input class="size-111 bor8 stext-102 cl2 p-lr-20" id="name" type="text" name="name">
                            </div>

                            <div class="col-sm-6 p-b-5">
                                <label class="stext-102 cl3" for="email">الايميل</label>
                                <input class="size-111 bor8 stext-102 cl2 p-lr-20" id="email" type="text" name="email">
                            </div>
                        </div>

                        <button class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10">
                            ارسال
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

                    </div>
                </div>


            </div>
        </div>
    </section>



</x-front-layout>
