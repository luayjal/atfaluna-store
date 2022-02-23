
<x-front-layout>

	<!-- Slider -->
	<section class="section-slide">
		<div class="wrap-slick1 rs1-slick1">
			<div class="slick1">

                @foreach($sliders as $slider)
				<div class="item-slick1" style="background-image: url({{asset('uploads/'.$slider->image_path)}});">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30">
							<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
								<span class="ltext-202 cl0 respon2">
									{{$slider->title}}

								</span>
							</div>

							<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
								<h2 class="ltext-104 cl0 p-t-19 p-b-43 respon1">
                                    {{$slider->description}}
								</h2>
							</div>

							<div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
								<a href="{{$slider->link}}" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									تسوق الآن
								</a>
							</div>
						</div>
					</div>
				</div>

                @endforeach
			</div>
		</div>
	</section>


	<!-- Banner -->
	<div class="sec-banner bg0 mt-4">
	<div class="flex-w flex-c-m">
			<div class="size-202 m-lr-auto respon4">

				<div class="block1 p-3">
                    <img src="{{asset('front/images/Inquiries.png')}}" width="100px" alt="">
					<a href="{{route('contact_us')}}" class="block1-txt ab-t-l s-full d-flex justify-content-end align-items-end p-lr-38 p-tb-34 trans-03 respon3">
						<div class="block1-txt-child1 flex-col-l">
							<span class="block1-name ltext-102 trans-04 p-b-8">
								الاستفسارات والاقتراحات
							</span>

						</div>
					</a>
				</div>
			</div>

			<div class="size-202 m-lr-auto respon4">

				<div class="block1 p-3">

                    <img src="{{asset('front/images/gift-icon.png')}}" width="100px" alt="">
					<a href="#" class="block1-txt ab-t-l s-full d-flex justify-content-end align-items-end p-lr-38 p-tb-34 trans-03 respon3">
						<div class="block1-txt-child1 flex-col-l">
							<span class="block1-name ltext-102 trans-04 p-b-8">
								هدايا ومسابقات
							</span>
						</div>
					</a>
				</div>
			</div>

			<div class="size-202 m-lr-auto respon4">

				<div class="block1 p-3">

                    <img src="{{asset('front/images/clothes.png')}}" width="100px" alt="">
					<a href="{{route('last_product')}}" class="block1-txt ab-t-l s-full d-flex justify-content-end align-items-end p-lr-38 p-tb-34 trans-03 respon3">
						<div class="block1-txt-child1 flex-col-l">
							<span class="block1-name ltext-102 trans-04 p-b-8">
								تشكيلات جديدة
							</span>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>


	<!-- Product -->
	<section class="bg0 p-t-23 p-b-140">
		<div class="container">
			<div class="p-b-10 p-t-10">
				<h3 class="ltext-103 cl5">
					المنتجات
				</h3>
			</div>


			<div class="row ">
                @foreach ($products as $product)
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35  {{$product->category->slug}}">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
							<img src="{{asset($product->image_url)}}" alt="IMG-PRODUCT">

							{{-- <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
								Quick View
							</a> --}}
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="{{route('product.details',$product->slug)}}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        {{$product->name}}
								</a>
                                <div class="d-flex justify-content-between w-100">
                                    @if ($product->discount_price > 0)
                                    <span class="stext-105 cl3">
                                        {{$product->discount_price}} ر.س

                                    </span>
                                    <span class="stext-105 text-danger">
                                        <del>{{$product->price}} ر.س </del>

                                    </span>
                                    @else
                                    <span class="stext-105 cl3">
                                        {{$product->price}} ر.س

                                    </span>
                                    @endif
                                </div>
							</div>

							<div class="block2-txt-child2 flex-r p-t-3">
								<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2 wishlist">
                                    @csrf
                                    <input type="hidden" class="product_id" value="{{$product->id}}">
									<img class="icon-heart1 dis-block trans-04" src="{{asset('front/images/icons/icon-heart-01.png')}}" alt="ICON">
									<img class="icon-heart2 dis-block trans-04 ab-t-l" src="{{asset('front/images/icons/icon-heart-02.png')}}" alt="ICON">
								</a>
							</div>
						</div>
					</div>
				</div>
                @endforeach
			</div>

			<!-- Load more -->
			{{-- <div class="flex-c-m flex-w w-full p-t-45">
				<a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
					عرض المزيد
				</a>
			</div> --}}
		</div>
	</section>



</x-front-layout>
