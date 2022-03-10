<x-front-layout>

    <!-- Add review -->
    <form class="w-full">
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

</x-front-layout>
