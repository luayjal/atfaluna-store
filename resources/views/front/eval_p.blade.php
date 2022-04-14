<x-front-layout>

    <!-- Add review -->
    <form class="w-full" style="padding: 60px" method="post"
          action="{{route('evalProduct',$id)}}">
        @csrf
        <h5 class="mtext-108 cl2 p-b-7">
            تقييمك
        </h5>



        @if($checkEval == 0)
                    @foreach($Products as $Product)

                    <input type="hidden" name="product_id[]" value="{{$Product->id}}">


                    <span class="wrap-rating fs-18 cl11 pointer">
                        <h5 class="mtext-108 cl2 p-b-7">
                        {{$Product->name}}
                    </h5>
                        <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                        <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                        <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                        <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                        <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                        <input class="dis-none" type="number" name="eval[]">
                    </span>
        <div class="row p-b-25">
            <div class="col-12 p-b-5">
                <label class="stext-102 cl3" for="review">مراجعتك</label>
                <textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10"  name="review[]"></textarea>

            </div>
        </div>


                    @endforeach

        <button class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10">
            ارسال
        </button>


                @else
                    @foreach($Products as $Product)
                    <span class="wrap-rating fs-18 cl11 pointer">
                        <h5 class="mtext-108 cl2 p-b-7">
                    {{$Product->name}}
                </h5>

                        @for($i=1;$i<=5;$i++)
                            @if($i<=$Product->eval)
                                <i class="zmdi zmdi-star"></i>
                            @else
                                <i class="zmdi zmdi-star-outline"></i>
                            @endif
                        @endfor
                    </span>
        </div>
                <div class="row p-b-25">
                    <div class="col-12 p-b-5">
                        <label class="stext-102 cl3" for="review">مراجعتك</label>
                        <div class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10">
                            {{$Product->review}}
                        </div>
                    </div>
                </div>
                    @endforeach

                @endif
        </form>

</x-front-layout>
