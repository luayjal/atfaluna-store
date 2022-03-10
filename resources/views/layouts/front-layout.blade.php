<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
	<title>متجر أطفالنا | الرئيسية</title>
	<meta charset="UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="{{asset('front/images/icons/favicon.png')}}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" href="{{asset('front/css/bootstrap.min.css')}}" integrity="sha384-P4uhUIGk/q1gaD/NdgkBIl3a6QywJjlsFJFk7SPRdruoGddvRVSwv5qFnvZ73cpz" crossorigin="anonymous">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('front/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('front/fonts/iconic/css/material-design-iconic-font.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('front/fonts/linearicons-v1.0.0/icon-font.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('front/vendor/animate/animate.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('front/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('front/vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('front/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('front/vendor/daterangepicker/daterangepicker.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('front/vendor/slick/slick.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('front/vendor/MagnificPopup/magnific-popup.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('front/vendor/perfect-scrollbar/perfect-scrollbar.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('front/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('front/css/main.css')}}">
<!--===============================================================================================-->
    @stack('css')
</head>
<body class=""> <!-- animsition -->

	<!-- Header -->
	<header class="header-v4">
		<!-- Header desktop -->
		<div class="container-menu-desktop trans-03">
            	<!-- Topbar -->
			<div class="top-bar">
				<div class="content-topbar flex-sb-m h-full container">
					<div class="left-top-bar">
						شحن مجاني للمشتريات أكثر من 150 ريال
					</div>

					<div class="right-top-bar flex-w h-full">
						<a href="{{route('contact_us')}}" class="flex-c-m trans-04 p-lr-25">
							تواصل معنا
						</a>

						<a href="/#about_us" class="flex-c-m trans-04 p-lr-25">
							 من نحن
						</a>

						<a href="{{route('return.policy')}}" class="flex-c-m trans-04 p-lr-25">
                            سياسة الاسترجاع والاستبدال
						</a>

						{{-- <a href="#" class="flex-c-m trans-04 p-lr-25">
							EN
						</a>

						<a href="#" class="flex-c-m trans-04 p-lr-25">
							USD
						</a> --}}
					</div>
				</div>
			</div>
			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop p-l-45">

					<!-- Logo desktop -->
					<a href="#" class="logo">
						<img src="{{asset('front/images/child-logo.png')}}" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li class="active-menu">
								<a href="/">الرئيسية</a>
								{{-- <ul class="sub-menu">
									<li><a href="index.html">Homepage 1</a></li>
									<li><a href="home-02.html">Homepage 2</a></li>
									<li><a href="home-03.html">Homepage 3</a></li>
								</ul> --}}
							</li>
                            @foreach ($categories as $category)
                            <li style="background: {{$category->background_color}}; ">
								<a  style="color:{{$category->font_color}};" href="{{route('category.product',$category->slug)}}">{{$category->name}}</a>
                                @if ($category->children->count() > 0)
                                <ul class="sub-menu">
                                    @foreach ($category->children as $item)
									<li><a href="{{route('category.product',$item->slug)}}">{{$item->name}}</a></li>
                                    @endforeach
								</ul>
                                @endif
                            </li>
                            @endforeach

                                     <!-- class="label1" data-label1="hot" -->
					<!--	<li  style="background: #ea4a76; color:#fff;" >
								<a  style=" color:#fff;" href="shoping-cart.html">ملابس أطفال بنات</a>
							</li>

							<li>
								<a href="blog.html">مواليد</a>
							</li>

							<li style="background: #717fe0;">
								<a  style=" color:#fff;" href="about.html">جزم واكسساورات</a>
							</li>

							<li style="background: #ff9b04;">
								<a style=" color:#fff;" href="contact.html">العاب</a>
							</li>-->
						</ul>
					</div>

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
							<i class="zmdi zmdi-search"></i>
						</div>

						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="{{$cart->count()}}">
							<i class="zmdi zmdi-shopping-cart"></i>
						</div>

						<a href="{{route('store.reviews')}}" class="btn btn-outline-warning   cl2 hov-cl1 trans-04 p-l-22 p-r-11 " >
							تقييم المتجر
						</a>
					</div>
				</nav>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->
			<div class="logo-mobile">
				<a href="/"><img src="{{asset('front/images/child-logo.png')}}" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m h-full m-r-15">
				<div class="flex-c-m h-full p-r-10">
					<div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-modal-search">
						<i class="zmdi zmdi-search"></i>
					</div>
				</div>

				<div class="flex-c-m h-full p-lr-10 bor5">
					<div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart" data-notify="2">
						<i class="zmdi zmdi-shopping-cart"></i>
					</div>
				</div>
                <a href="{{route('store.reviews')}}" class="btn btn-outline-warning   cl2 hov-cl1 trans-04 p-l-22 p-r-11 " >
                    تقييم المتجر
                </a>
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
            <ul class="topbar-mobile">
				<li>
					<div class="left-top-bar">
						شحن مجاني للمشتريات أكبر من 150 ريال
					</div>
				</li>

				<li>
					<div class="right-top-bar flex-w h-full">
						<a href="{{route('contact_us')}}" class="flex-c-m trans-04 p-lr-25">
							تواصل معنا
						</a>

						<a href="#" class="flex-c-m trans-04 p-lr-25">
							 من نحن
						</a>



					</div>
				</li>
			</ul>
			<ul class="main-menu-m">
				<li>
					<a href="{{route('home')}}">الرئيسية</a>

				</li>
                @foreach ($categories as $category)
                <li style="background: {{$category->background_color}}; ">
                    <a  style="color:{{$category->font_color}};" href="{{route('category.product',$category->slug)}}">{{$category->name}}</a>
                    @if ($category->children->count() > 0)
                    <ul class="sub-menu">
                        @foreach ($category->children as $item)
                        <li><a href="{{route('category.product',$item->slug)}}">{{$item->name}}</a></li>
                        @endforeach
                    </ul>
                    @endif
                </li>
                @endforeach


			</ul>
		</div>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="{{asset('front/images/icons/icon-close2.png')}}" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15">
					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="search" placeholder="Search...">
				</form>
			</div>
		</div>
	</header>

	<!-- Sidebar -->
	{{-- <aside class="wrap-sidebar js-sidebar">
		<div class="s-full js-hide-sidebar"></div>

		<div class="sidebar flex-col-l p-t-22 p-b-25">
			<div class="flex-r w-full p-b-30 p-r-27">
				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-sidebar">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>

			<div class="sidebar-content flex-w w-full p-lr-65 js-pscroll">
				<ul class="sidebar-link w-full">
					<li class="p-b-13">
						<a href="index.html" class="stext-102 cl2 hov-cl1 trans-04">
							Home
						</a>
					</li>

					<li class="p-b-13">
						<a href="#" class="stext-102 cl2 hov-cl1 trans-04">
							My Wishlist
						</a>
					</li>

					<li class="p-b-13">
						<a href="#" class="stext-102 cl2 hov-cl1 trans-04">
							My Account
						</a>
					</li>

					<li class="p-b-13">
						<a href="#" class="stext-102 cl2 hov-cl1 trans-04">
							Track Oder
						</a>
					</li>

					<li class="p-b-13">
						<a href="#" class="stext-102 cl2 hov-cl1 trans-04">
							Refunds
						</a>
					</li>

					<li class="p-b-13">
						<a href="#" class="stext-102 cl2 hov-cl1 trans-04">
							Help & FAQs
						</a>
					</li>
				</ul>

				<div class="sidebar-gallery w-full p-tb-30">
					<span class="mtext-101 cl5">
						@ CozaStore
					</span>


				</div>

				<div class="sidebar-gallery w-full">
					<span class="mtext-101 cl5">
						About Us
					</span>

					<p class="stext-108 cl6 p-t-27">
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur maximus vulputate hendrerit. Praesent faucibus erat vitae rutrum gravida. Vestibulum tempus mi enim, in molestie sem fermentum quis.
					</p>
				</div>
			</div>
		</div>
	</aside>
 --}}
    <!-- Cart -->
	<x-cart/>

    {{$slot}}

	<!-- Footer -->
    <footer class="bg3 p-t-75 p-b-32">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-4 p-b-50">
                    <h4 class="stext-301 cl0 p-b-30">
                        الأقسام
                    </h4>

                    <ul>

                        @foreach ($categories as $category)
                            <li class="p-b-10" style="background: {{$category->background_color}};margin-top: 5px ">
                                <a class="stext-107 cl7 hov-cl1 trans-04"
                                   style="color:{{$category->font_color}};"
                                   href="{{route('category.product',$category->slug)}}">{{$category->name}}</a>
                                @if ($category->children->count() > 0)
                                    <ul class="sub-menu">
                                        @foreach ($category->children as $item)
                                            <li><a href="{{route('category.product',$item->slug)}}">{{$item->name}}</a></li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach


                    </ul>
                </div>

                <div class="col-sm-6 col-lg-4 p-b-50 text-center">
                    <h4 class="stext-301 cl0 p-b-30">
                        مناديب التوصيل
                    </h4>

                    <ul class="justify-content-around row">
                        @foreach($deliverys as $delivery)

                            <li class="p-b-10 col-6">
                                <span href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                    {{$delivery->name}}
                                </span>
                            </li>
                            <li class="p-b-10  cl11 col-6">
                                @for($i=1;$i<=5;++$i)
                                    @if($delivery->sum >=$i)
                                        <i class="zmdi zmdi-star"></i>
                                    @else
                                        <i class="zmdi zmdi-star-outline"></i>
                                    @endif
                                @endfor
                            </li>
                        @endforeach

                    </ul>
                </div>



                <div class="col-sm-6 col-lg-4 p-b-50">
                    <h4 class="stext-301 cl0 p-b-30">
                        اشترك معنا
                    </h4>

                    <form>
                        <div class="wrap-input1 w-full p-b-4">
                            <input class="input1 bg-none plh1 stext-107 cl7" type="text" name="email"
                                   placeholder="email@example.com">
                            <div class="focus-input1 trans-04"></div>
                        </div>

                        <div class="p-t-18">
                            <button class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
                                Subscribe
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="p-t-40">
                <div class="flex-c-m flex-w p-b-18">
                    <a href="#" class="m-all-1">
                        <img src="{{asset('front/images/icons/icon-pay-01.png')}}" alt="ICON-PAY">
                    </a>

                    <a href="#" class="m-all-1">
                        <img src="{{asset('front/images/icons/icon-pay-02.png')}}" alt="ICON-PAY">
                    </a>

                    <a href="#" class="m-all-1">
                        <img src="{{asset('front/images/icons/icon-pay-03.png')}}" alt="ICON-PAY">
                    </a>

                    <a href="#" class="m-all-1">
                        <img src="{{asset('front/images/icons/icon-pay-04.png')}}" alt="ICON-PAY">
                    </a>

                    <a href="#" class="m-all-1">
                        <img src="{{asset('front/images/icons/icon-pay-05.png')}}" alt="ICON-PAY">
                    </a>
                </div>

                <p class="stext-107 cl6 txt-center">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    جميع الحقوق محفوظة &copy;
                    <script>document.write(new Date().getFullYear());</script>
                    <!-- All rights reserved | Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> &amp; distributed by <a href="https://themewagon.com" target="_blank">ThemeWagon</a> -->
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

                </p>
            </div>
        </div>
    </footer>


	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

	<!-- Modal1 -->


<!--===============================================================================================-->
	<script src="{{asset('front/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('front/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('front/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('front/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('front/vendor/select2/select2.min.js')}}"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="{{asset('front/vendor/daterangepicker/moment.min.js')}}"></script>
	<script src="{{asset('front/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('front/vendor/slick/slick.min.js')}}"></script>
	<script src="{{asset('front/js/slick-custom.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('front/vendor/parallax100/parallax100.js')}}"></script>
	<script>
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script src="{{asset('front/vendor/MagnificPopup/jquery.magnific-popup.min.js')}}"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>
<!--===============================================================================================-->
	<script src="{{asset('front/vendor/isotope/isotope.pkgd.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('front/vendor/sweetalert/sweetalert.min.js')}}"></script>
	<script src="{{asset('front/js/cart-wishlist.js')}}"></script>

<!--===============================================================================================-->
	<script src="{{asset('front/vendor/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	<script src="{{asset('front/js/main.js')}}"></script>
    <script>


        $(document).ready(function() {
            var product_id;

            $('.wishlist').click(function(e) {
                e.preventDefault();
                var product_id = $(".product_id").val();
                console.log(product_id);

                $(this).siblings().each(function(){
                    if($(this).hasClass("product_id")){
                        product_id = $(this).val();
                        console.log(product_id);
                    }


                });
            //	alert("comment_id: " +comment_id+ " body: " +body);
            $.ajax({
            url: '/add-wishlist',
            type:"POST",
            data:{
                "_token": "{{ csrf_token() }}",
                product_id:product_id
            },
            success:function(data){
                console.log(data);
                            console.log(data.count);

                            $('.wishlist_count').attr('data-notify',data.count);
            },
            });
            });

        });
</script>
@stack('js')
</body>
</html>
