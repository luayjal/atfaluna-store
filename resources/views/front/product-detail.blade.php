
<x-front-layout>


	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
				الرئيسية
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<a href="product.html" class="stext-109 cl8 hov-cl1 trans-04">
				ملابس أولاد أطفال
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				قميص أطفال
			</span>
		</div>
	</div>


	<!-- Product Detail -->
	<section class="sec-product-detail bg0 p-t-65 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-7 p-b-30">
					<div class="p-l-25 p-r-30 p-lr-0-lg">
						<div class="wrap-slick3 flex-sb flex-w">
							<div class="wrap-slick3-dots"></div>
							<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

							<div class="slick3 gallery-lb">
								<div class="item-slick3" data-thumb="{{$product->image_url}}">
									<div class="wrap-pic-w pos-relative img-zoom">
										<img src="{{$product->image_url}}" alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{$product->image_url}}">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>
                                @foreach ($product->images as $image)
								<div class="item-slick3" data-thumb="{{$image->image_url}}">
									<div class="wrap-pic-w pos-relative img-zoom">
										<img src="{{$image->image_url}}" alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{$image->image_url}}">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>
                                @endforeach
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-6 col-lg-5 p-b-30">
					<div class="p-r-50 p-t-5 p-lr-0-lg">
						<h4 class="mtext-105 cl2 js-name-detail p-b-14">
							{{$product->name}}
						</h4>
                        <span class="fs-18 cl11 d-block">
                            <i class="zmdi zmdi-star"></i>
                            <i class="zmdi zmdi-star"></i>
                            <i class="zmdi zmdi-star"></i>
                            <i class="zmdi zmdi-star"></i>
                            <i class="zmdi zmdi-star"></i>
                        </span>
						<span class="mtext-106 cl2">
						{{$product->price}} ر.س
						</span>

							<div class="flex-w flex-r-m p-b-10 mt-3">
								<div class="size-203 flex-c-m respon6">
									اللون
								</div>

								<div class="size-204 respon6-next">

                                    <div class="container-fluid">

										<div class="btn-group btn-group-toggle"  data-toggle="buttons">
										 @foreach ($colors as $color)
                                         <label class="btn btn-outline-dark colorlabel" for="color{{$color->value}}">
											<input type="radio" name="color" value="{{$color->value}}" id="color{{$color->value}}" autocomplete="off" class="color"> {{$color->value}}
										  </label>
                                         @endforeach
										</div>

									</div>
								</div>
							</div>

							<div class="flex-w flex-r-m p-b-10">
								<div class="size-203 flex-c-m respon6">
									المقاس
								</div>

								<div class="size-204 respon6-next">

									<div class="container-fluid">

										<div class="btn-group btn-group-toggle" data-toggle="buttons">
                                          @foreach ($sizes as $size)
										    <label class="btn btn-outline-dark sizelabel" for="size{{$size->value}}">
											<input type="radio" name="size" value="{{$size->value}}" id="size{{$size->value}}" autocomplete="off" class="size" > {{$size->value}}
										  </label>
                                          @endforeach

										</div>

									</div>


								</div>
							</div>

                    <div class=" product-desc">
						<p class="stext-102 cl3 p-t-23">
							<h5>الوصف</h5>
                            {!!$product->description!!}
						</p>
                        </div>
						<!--  -->
                        <form id="form_cart">
						<div class="p-t-33">
                            <input  type="hidden" name="product_id" value="{{$product->id}}">
                            @csrf

                            <div class="alert alert-danger d-none msg-error">
                                <ul>

                                </ul>
                            </div>



							<p class="stext-102 cl3 p-t-23">
								<h5 class="mb-2">تفاصيل المقاس</h5>
								 @if ($product->image_disc)
                               <div class="image_disc_zoom">

                                    <img src="{{$product->image_disc}}" alt="" class="img-fluid ">
                                </div>

                                @else
                                    {{$product->description_size}}
                                @endif
							</p>
							<div class="flex-w flex-r-m p-b-10">
								<div class="size-204 flex-w flex-m respon6-next">
									<div class="wrap-num-product flex-w m-l-20 m-tb-10">
										<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-minus"></i>
										</div>

										<input class="mtext-104 cl3 txt-center num-product" type="number" name="quantity" value="1">

										<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-plus"></i>
										</div>
									</div>


									<button type="button" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
										أضف الى العربة
									</button>
								</div>
							</div>
						</div>
                      </form>


					</div>
				</div>
			</div>

			<div class="bor10 m-t-50 p-t-43 p-b-40">
				<!-- Tab01 -->
				<div class="tab01">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						 <li class="nav-item p-b-10">
							<a class="nav-link active" data-toggle="tab" href="#certificate" role="tab">شهادة المنتج</a>
						</li>



						<li class="nav-item p-b-10">
							<a class="nav-link" data-toggle="tab" href="#reviews" role="tab">المرجعات والتقييمات</a>
						</li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content p-t-43">


						<!-- - -->
						<div class="tab-pane fade active show" id="certificate" role="tabpanel">
							<div class="row">
								<div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
									<div class="p-b-30 m-lr-15-sm">
                                        <img class="img-fluid" src="{{asset($product->certificate_url)}}" alt="">
									</div>
								</div>
							</div>
						</div>

						<div class="tab-pane fade" id="reviews" role="tabpanel">
							<div class="row">
								<div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
									<div class="p-b-30 m-lr-15-sm">
										<!-- Review -->
										<div class="flex-w flex-t p-b-68">
											<div class="wrap-pic-s size-109 bor0 of-hidden m-l-18 m-t-6">
												<img src="/front/images/avatar-02.jpg" alt="AVATAR">
											</div>

											<div class="size-207">
												<div class="flex-w flex-sb-m p-b-17">
													<span class="mtext-107 cl2 p-l-20">
														محمد مصطفى
													</span>

													<span class="fs-18 cl11">
														<i class="zmdi zmdi-star"></i>
														<i class="zmdi zmdi-star"></i>
														<i class="zmdi zmdi-star"></i>
														<i class="zmdi zmdi-star"></i>
														<i class="zmdi zmdi-star-half"></i>
													</span>
												</div>

												<p class="stext-102 cl6">
													طقم رائع ومميز جداً هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص
												</p>
											</div>
										</div>

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
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
			<span class="stext-107 cl6 p-lr-25">
				القسم :  أطقم وقمصان , ملابس أولاد
			</span>
		</div>
	</section>


	<!-- Related Products -->
	<section class="sec-relate-product bg0 p-t-45 p-b-105">
		<div class="container">
			<div class="p-b-45">
				<h3 class="ltext-106 cl5 txt-center">
					منتجات ذات صلة
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">

					@foreach ($related_products as $product)
                    <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-pic hov-img0">
								<img src="{{$product->image_url}}" alt="IMG-PRODUCT">

								<a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
									Quick View
								</a>
							</div>

							<div class="block2-txt flex-w flex-t p-t-14">
								<div class="block2-txt-child1 flex-col-l ">
									<a href="{{route('product.details',$product->slug)}}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
										{{$product->name}}
									</a>

									<span class="stext-105 cl3">
										{{$product->price}}
									</span>
								</div>
								<div class="block2-txt-child2 flex-r p-t-3">
									<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
										<img class="icon-heart1 dis-block trans-04" src="{{asset('front/images/icons/icon-heart-01.png')}}" alt="ICON">
										<img class="icon-heart2 dis-block trans-04 ab-t-l" src="{{asset('front/images/icons/icon-heart-02.png')}}" alt="ICON">
									</a>
								</div>
							</div>
						</div>
					</div>
                    @endforeach

				</div>
			</div>
		</div>
	</section>



    @push('css')


    <style>
     </style>
    @endpush
	@push('js')
     <script src="{{asset('front/js/jquery.zoom.js')}}"></script>
     <script>
            $('.img-zoom').zoom({
            magnify: 1
         });
         $('.image_disc_zoom').zoom({
            magnify: 1.6
         });
     </script>
    <script>
        $(document).ready(function() {
        $("label").click(function(){
            var input = $(this).parent().find($("input[id='" + $(this).attr('for') + "']"));
             input.attr('checked','checked');
        });
        });
    </script>
    @endpush



</x-front-layout>
