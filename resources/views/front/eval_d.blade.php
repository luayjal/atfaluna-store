<x-front-layout>

    <!-- Add review -->
    <form class="w-full" style="padding: 60px" method="post"
          action="{{route('evalDelivery',$id)}}" >
        @csrf
        <h5 class="mtext-108 cl2 p-b-7">
            أضف مراجعتك
        </h5>

        <h5 class="mtext-108 cl2 p-b-7">
            {{$delivery->user->name}}
        </h5>


        <div class="flex-w flex-m p-t-50 p-b-23">
												<span class="stext-102 cl3 m-l-16">
													تقييمك
												</span>

            <span class="wrap-rating fs-18 cl11 pointer">
                @if($checkEval==0)
                    <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                    <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                    <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                    <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                    <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                    <input class="dis-none" type="number" name="eval">
                @else
                    @for($i=1;$i<=5;$i++)
                        @if($i<=$eval->eval)
                            <i class="zmdi zmdi-star"></i>
                        @else
                            <i class="zmdi zmdi-star-outline"></i>
                        @endif
                    @endfor
                @endif
            </span>
        </div>

        <div class="row p-b-25">
            <div class="col-12 p-b-5">
                <label class="stext-102 cl3" for="review">مراجعتك</label>
                @if($checkEval==0)
                <textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10" id="review" name="review"></textarea>

                @else
                    <div class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10">
                        {{$eval->review}}
                    </div>

                @endif
            </div>

        </div>
        @if($checkEval==0)
        <button class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10">
            ارسال
        </button>
        @endif
    </form>

</x-front-layout>
