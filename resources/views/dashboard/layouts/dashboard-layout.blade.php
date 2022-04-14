<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html dir="rtl" lang="ar">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('dashboard/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('dashboard/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('dashboard/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('dashboard/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dashboard/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('dashboard/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('dashboard/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('dashboard/plugins/summernote/summernote-bs4.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Bootstrap 4 RTL -->
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css">
    <!-- Custom style for RTL -->
    <link rel="stylesheet" href="{{ asset('dashboard/dist/css/custom.css') }}">
    @stack('css')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('home') }}" class="nav-link">عرض الموقع</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- SEARCH FORM -->
            <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search"
                        aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

            <!-- Right navbar links -->
            <ul class="navbar-nav mr-auto-navbav">
                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="dist/img/user1-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i
                                                class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="dist/img/user8-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i
                                                class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="dist/img/user3-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i
                                                class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button class="btn btn-outline-dark">تسجيل الخروج</button>
                    </form>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('home') }}" class="brand-link">
                <img src="/dashboard/img/child-logo.jpg" alt="AdminLTE Logo" class="brand-image  elevation-3">
                <!-- img-circle -->
                <span class="brand-text font-weight-light">متجر أطفالنا</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="/dashboard/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        @can('viewAny', App\Models\User::class)
                            <li class="nav-header">المستخدمين</li>

                            <li class="nav-item has-treeview "> {{-- menu-open --}}
                                <a href="#" class="nav-link @if (request()->routeIs('admin.users.*')) active @endif">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        المستخدمين
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @can('viewAny', App\Models\User::class)
                                        <li class="nav-item">
                                            <a href="{{ route('admin.users.index') }}"
                                                class="nav-link @if (request()->routeIs('admin.users.index')) active @endif">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>عرض المستخدمين</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('create', App\Models\User::class)
                                        <li class="nav-item">
                                            <a href="{{ route('admin.users.create') }}"
                                                class="nav-link @if (request()->routeIs('admin.register')) active @endif">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>إضافة مستخدم</p>
                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                        @endcan
                        @can('viewAny', App\Models\DeliveryAgents::class)

                            <li class="nav-item has-treeview ">
                                <a href="#" class="nav-link @if (request()->routeIs('admin.delivery.*')) active @endif">
                                    <i class="nav-icon fas fa-shipping-fast"></i>
                                    <p>
                                        مناديب التوصيل
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @can('viewAny', App\Models\DeliveryAgents::class)
                                        <li class="nav-item">
                                            <a href="{{ route('admin.delivery.index') }}"
                                                class="nav-link @if (request()->routeIs('admin.delivery.index')) active @endif">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>عرض مناديب التوصيل</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('create', App\Models\DeliveryAgents::class)
                                        <li class="nav-item">
                                            <a href="{{ route('admin.delivery.create') }}"
                                                class="nav-link @if (request()->routeIs('admin.delivery.create')) active @endif">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>إضافة مندوب توصيل</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('viewEvaluation', App\Models\DeliveryAgents::class)
                                        <li class="nav-item">
                                            <a href="{{ route('admin.evaluation.delivery.index') }}"
                                                class="nav-link @if (request()->routeIs('admin.evaluation.delivery.index')) active @endif">
                                                <i class="fas fa-star nav-icon"></i>
                                                <p>تقييمات مندوبي التوصيل</p>
                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                        @endcan


                        @can('viewAny', App\Models\Message::class)
                            <li class="nav-item">
                                <a href="{{ route('admin.messages') }}" class="nav-link">
                                    <i class="nav-icon fas fa-envelope"></i>
                                    <p>
                                        الرسائل
                                    </p>
                                </a>
                            </li>
                        @endcan

                        <li class="nav-header">المنتجات والأقسام</li>
                        @can('viewAny', App\Models\Category::class)

                            <li class="nav-item has-treeview "> {{-- menu-open --}}
                                <a href="#" class="nav-link @if (request()->routeIs('admin.categories.*')) active @endif">
                                    <i class="nav-icon fas fa-network-wired"></i>
                                    <p>
                                        الأقسام
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @can('viewAny', App\Models\Category::class)
                                        <li class="nav-item">
                                            <a href="{{ route('admin.categories.index') }}"
                                                class="nav-link @if (request()->routeIs('admin.categories.index')) active @endif">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>عرض الأقسام</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('create', App\Models\Category::class)
                                        <li class="nav-item">
                                            <a href="{{ route('admin.categories.create') }}"
                                                class="nav-link @if (request()->routeIs('admin.categories.create')) active @endif">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>إضافة قسم</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('admin.categories.trash') }}"
                                                class="nav-link @if (request()->routeIs('admin.categories.trash')) active @endif">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>الأقسام المحذوفة</p>
                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>

                        @endcan

                        @can('viewany', App\Models\Product::class)

                            <li class="nav-item has-treeview ">
                                <a href="#" class="nav-link @if (request()->routeIs('admin.products.*')) active @endif">
                                    <i class="nav-icon fas fa-tshirt"></i>
                                    <p>
                                        المنتجات
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @can('viewAny', App\Models\Product::class)
                                        <li class="nav-item">
                                            <a href="{{ route('admin.products.index') }}"
                                                class="nav-link @if (request()->routeIs('admin.products.index')) active @endif">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>عرض المنتجات</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('create', App\Models\Product::class)
                                        <li class="nav-item">
                                            <a href="{{ route('admin.products.create') }}"
                                                class="nav-link @if (request()->routeIs('admin.products.create')) active @endif">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>إضافة منتج</p>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="{{ route('admin.products.trash') }}"
                                                class="nav-link @if (request()->routeIs('admin.products.trash')) active @endif">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>المنتجات المحذوفة</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('viewEvaluation', App\Models\Product::class)
                                        <li class="nav-item">
                                            <a href="{{ route('admin.evaluation.products.index') }}"
                                                class="nav-link @if (request()->routeIs('admin.evaluation.products.index')) active @endif">
                                                <i class="fas fa-star nav-icon"></i>
                                                <p>تقييمات المنتجات </p>
                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                        @endcan
                        @can('viewAny', App\Models\Coupon::class)
                            <li class="nav-header">العروض والهدايا</li>


                            <li class="nav-item has-treeview ">
                                <a href="#" class="nav-link @if (request()->routeIs('admin.coupons.*')) active @endif">
                                    <i class="fas fa-gift nav-icon"></i>
                                    <p>
                                        الهدايا والكوبونات
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @can('viewAny', App\Models\Coupon::class)
                                        <li class="nav-item">
                                            <a href="{{ route('admin.coupons.index') }}"
                                                class="nav-link @if (request()->routeIs('admin.coupons.index')) active @endif">
                                                <i class="nav-icon fas fa-percent nav-icon"></i>
                                                <p>عرض الكوبونات</p>
                                            </a>
                                        </li>
                                    @endcan

                                    @can('create', App\Models\Coupon::class)
                                        <li class="nav-item">
                                            <a href="{{ route('admin.coupons.create') }}"
                                                class="nav-link @if (request()->routeIs('admin.coupons.create')) active @endif">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>إضافة كوبون</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('admin.gifts.index') }}"
                                                class="nav-link @if (request()->routeIs('admin.gifts.index')) active @endif">
                                                <i class="nav-icon fas fa-gift nav-icon"></i>
                                                <p>عرض الهدايا</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('admin.gifts.create') }}"
                                                class="nav-link @if (request()->routeIs('admin.gifts.create')) active @endif">
                                                <i class="nav-icon fas fa-gift nav-icon"></i>
                                                <p>اضافة هدية</p>
                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                            <li class="nav-item has-treeview ">
                                <a href="#" class="nav-link @if (request()->routeIs('admin.coupons.*')) active @endif">

                                    <i class="nav-icon fab fa-youtube"></i>
                                    <p>
                                        عروض الفيديو
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.advertising.index') }}"
                                            class="nav-link @if (request()->routeIs('admin.advertising.index')) active @endif">
                                            <i class="nav-icon fas fa-play"></i>
                                            <p>عرض الفيديوهات</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endcan
                        @can('viewAny', App\Models\Order::class)
                            <li class="nav-header">الطلبات</li>


                            <li class="nav-item has-treeview "> {{-- menu-open --}}
                                <a href="#" class="nav-link @if (request()->routeIs('admin.orders.*')) active @endif">
                                    <i class="nav-icon fas fa-shopping-bag"></i>
                                    <p>
                                        الطلبات
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">

                                    <li class="nav-item">
                                        <a href="{{ route('admin.orders') }}"
                                            class="nav-link @if (request()->routeIs('admin.orders')) active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>عرض الطلبات</p>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                        @endcan


                        <li class="nav-header"> الاعدادات والصفحات</li>
                        @can('viewAny', App\Models\City::class)
                            <li class="nav-item has-treeview ">
                                <a href="#" class="nav-link @if (request()->routeIs('admin.city.*')) active @endif">
                                    <i class="nav-icon fas fa-city"></i>
                                    <p>
                                        المدن
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @can('viewAny', App\Models\City::class)
                                        <li class="nav-item">
                                            <a href="{{ route('admin.city.index') }}"
                                                class="nav-link @if (request()->routeIs('admin.city.index')) active @endif">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>عرض المدن</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('create', App\Models\City::class)
                                        <li class="nav-item">
                                            <a href="{{ route('admin.city.create') }}"
                                                class="nav-link @if (request()->routeIs('admin.city.create')) active @endif">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>إضافة مدينة</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('admin.city.trash') }}"
                                                class="nav-link @if (request()->routeIs('admin.city.trash')) active @endif">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p> المدن المحذوفة</p>
                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                        @endcan
                        @can('viewAny', App\Models\Slider::class)

                            <li class="nav-item has-treeview ">
                                <a href="#" class="nav-link @if (request()->routeIs('admin.slider.*')) active @endif">
                                    <i class="nav-icon fas fa-ad"></i>
                                    <p>
                                        الاعلانات(السلايدر)
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @can('viewAny', App\Models\Slider::class)
                                        <li class="nav-item">
                                            <a href="{{ route('admin.slider.index') }}"
                                                class="nav-link @if (request()->routeIs('admin.slider.index')) active @endif">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>عرض الاعلانات(السلايدر)</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('create', App\Models\Slider::class)
                                        <li class="nav-item">
                                            <a href="{{ route('admin.slider.create') }}"
                                                class="nav-link @if (request()->routeIs('admin.slider.create')) active @endif">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>إضافة اعلان (سلايدر)</p>
                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                        @endcan
                        @can('viewAny', App\Models\AboutUs::class)
                            <li class="nav-item">
                                <a href="{{ route('admin.setting.about-us') }}" class="nav-link">
                                    <i class="nav-icon fas fa-address-card"></i>
                                    <p>
                                        الصفحات
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('viewEvaluation', App\Models\AboutUs::class)
                            <li class="nav-item">
                                <a href="{{ route('admin.evaluation.store.index') }}"
                                    class="nav-link @if (request()->routeIs('admin.evaluation.store.index')) active @endif">
                                    <i class="fas fa-star nav-icon"></i>
                                    <p>تقييمات المتجر</p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">


            <!-- Main content -->
            <div class="content">
                <div class="container">
                    <div class="page-title pt-5">
                        <h3>{{ $header }}</h3>
                    </div>
                </div>

                {{ $slot }}

            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                متجر أطفالنا
            </div>
            <!-- Default to the left -->

            <strong>جميع الحقوق محفوظة &copy; 2022</strong>
        </footer>
    </div>

    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('dashboard/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dashboard/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dashboard/dist/js/adminlte.min.js') }}"></script>

    @stack('js')
</body>

</html>
