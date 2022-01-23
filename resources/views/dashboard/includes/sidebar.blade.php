<nav class="pcoded-navbar menu-light ">
  <div class="navbar-wrapper  ">
    <div class="navbar-content scroll-div " >
      
      <div class="">
        <div class="main-menu-header">
          <img  src="/Ico/The Logo.jpeg" >
         
        </div>
      <hr>
      <ul class="nav pcoded-inner-navbar ">
        
        <li class="nav-item {{ Request::is('admin')? 'active':'' }} pcoded-hasmenu">
          <a href="{{route ('dashboard') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home " ></i></span><span class="pcoded-mtext">{{ trans('admin.Dashboard') }}</span></a>
         
        </li>
        
        {{--  <li class="nav-item  {{ Request::is('#!')? 'active':'' }}     pcoded-hasmenu">
              <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-list"></i></span><span class="pcoded-mtext">{{ trans('admin.HelloMessage') }}</span></a>
              <ul class="pcoded-submenu">
                <li><a style="text-decoration: none" href="{{ route('HelloMessage')}}">
                  <i  style="font-size:15px; color:cornflowerblue;" class="feather icon-eye">
                  </i> <span style="font-size: 18px;bottom-left:5px;"> {{ trans('admin.Show HelloMessage') }} </a></li>
             <li><a style="text-decoration: none" href="{{ route('addmessage') }}"><i style="color: green; font-size:20px" class="feather icon-plus"></i> {{ trans('admin.Add HelloMessage') }}</a></li> 
                
              </ul>
            </li> --}}
        <li class="nav-item pcoded-hasmenu">
          <a href="{{ route('users') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">{{ trans('admin.Users') }}</span></a>
            </li>
            {{-- //category --}}
            <li class="nav-item  {{ Request::is('#!')? 'active':'' }}     pcoded-hasmenu">
              <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-list"></i></span><span class="pcoded-mtext">{{ trans('admin.Categories') }}</span></a>
              <ul class="pcoded-submenu">
                <li><a style="text-decoration: none" href="{{ route('categories') }}">
                  <i  style="font-size:15px; color:cornflowerblue;" class="feather icon-eye">
                  </i> <span style="font-size: 18px;bottom-left:5px;"> {{ trans('admin.Show Category') }} </a></li>
                <li><a style="text-decoration: none" href="{{ route('add-category') }}"><i style="color: green; font-size:20px" class="feather icon-plus"></i> {{ trans('admin. Add Category') }}</a></li>
                {{-- <li><a style="text-decoration: none" href="{{ url('admin/edit-category/'.$category->id) }}"> <i style="font-size:15px; color:blue;" class="feather icon-edit"></i> &nbsp; Edit Category</a></li> --}}
                {{-- <li><a style="text-decoration: none" href="{{ route('categories') }}"><i  style="font-size:15px; color: red;" class="feather icon-trash"></i> &nbsp; Delete Category</a></li> --}}
              </ul>
            </li>
            {{---------- Order-------}}

            <li class="nav-item  {{ Request::is('#!')? 'active':'' }}     pcoded-hasmenu">
              <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="fas fa-shopping-bag"></i></span><span class="pcoded-mtext">الطلبات</span> <i class="fas fa-bell"></i></a>
              
              <ul class="pcoded-submenu">
                <li><a style="text-decoration: none" href="{{ route('order') }}">
                  <i  style="font-size:15px; color:cornflowerblue;" class="feather shopping-bag">
                  </i> <span style="font-size: 18px;bottom-left:5px;">عرض الطلبات</a></li>
                <li><a style="text-decoration: none" href="{{ route('order.canceled') }}">
                  <i  style="font-size:15px; color:cornflowerblue;" class="feather shopping-bag">
                  </i> <span style="font-size: 18px;bottom-left:5px;">الطلبات الملغية </a></li>
               
              </ul>
            </li>

            {{-- Size Bar --}}

            <li class="nav-item  {{ Request::is('#!')? 'active':'' }}     pcoded-hasmenu">
              <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="fas fa-window-maximize"></i></span><span class="pcoded-mtext">{{ trans('admin.sizes') }}</span></a>
              <ul class="pcoded-submenu">
                <li><a style="text-decoration: none" href="{{ route('sizes') }}">
                  <i  style="font-size:15px; color:cornflowerblue;" class="feather icon-eye">
                  </i> <span style="font-size: 18px;bottom-left:5px;"> {{ trans('admin.Show size') }} </a></li>
                <li><a style="text-decoration: none" href="{{ route('add-size') }}"><i style="color: green; font-size:20px" class="feather icon-plus"></i> {{ trans('admin.add size') }}</a></li>
              </ul>
            </li>
                {{-- Color Bar --}}
                <li class="nav-item  {{ Request::is('#!')? 'active':'' }}     pcoded-hasmenu">
                  <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="fas fa-paint-brush"></i></span><span class="pcoded-mtext">{{ trans('admin.colors') }}</span></a>
                  <ul class="pcoded-submenu">
                    <li><a style="text-decoration: none" href="{{ route('colors') }}">
                      <i  style="font-size:15px; color:cornflowerblue;" class="feather icon-eye">
                      </i> <span style="font-size: 18px;bottom-left:5px;"> {{ trans('admin.Show color') }} </a></li>
                    <li><a style="text-decoration: none" href="{{ route('add-color') }}"><i style="color: green; font-size:20px" class="feather icon-plus"></i> {{ trans('admin.add color') }}</a></li>
                  </ul>
                </li>

                <li class="nav-item {{ Request::is('#!')? 'active':'' }} pcoded-hasmenu">
                  <a href="#!"  class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-plus"></i></span><span class="pcoded-mtext">{{ trans('admin.Products') }}</span></a>
                  <ul class="pcoded-submenu">
                    <li><a style="text-decoration: none" href="{{ route('products') }}">
                      <i  style="font-size:15px; color:cornflowerblue;" class="feather icon-eye"></i> 
                       <span style="font-size: 18px;bottom-left:5px;"> {{ trans('admin.show products') }}</span></a></li>
                    
                      <li><a style="text-decoration:none;" href="{{ url('admin/add-product') }}">
                        <i  style="color: green; font-size:20px;"  class="feather icon-plus"></i>
                        {{ trans('admin.add product') }}</a></li>
                   
                  </ul>
                </li>
                <li class="nav-item pcoded-hasmenu">
                  <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="fas fa-sliders-h"></i></span><span class="pcoded-mtext">{{ trans('admin.Banner') }}</span></a>
                    
                  <ul class="pcoded-submenu">

                    <li><a style="text-decoration: none" href="{{ route('homebanner') }}">
                      <i  style="font-size:15px; color:cornflowerblue;" class="feather icon-eye"></i>  <span style="font-size: 18px;bottom-left:5px;"> {{ trans('admin.show banner') }}</span></a></li>
                    <li><a style="text-decoration:none;" href="{{ route('add-banner') }}">
                      <i  style="color: green; font-size:20px;"  class="feather icon-plus"></i>  <span style="font-size: 18px;bottom-left:5px;">{{ trans('admin.add banner') }}</span></a></li>
                    {{-- <li><a style="text-decoration:none;" href="{{ url('admin/edit-banner/'.$banner->id) }}"><i style="color: blue;font-size:15px;" class="feather icon-edit"></i> <span style="font-size: 18px;bottom-left:5px;"> {{ trans('admin.edit banner') }}</span></a></li> --}}
                    {{-- <li><a style="text-decoration:none;" href="{{ route('homebanner') }}" >
                      <i style="color: red; font-size:15px;" class="feather icon-trash"> --}}
                      {{-- </i> <span style="font-size: 18px; bottom-left:5px;">{{ trans('admin.delete banner') }}</span></a></li> --}}
  
                  </ul> 
                
                </li>

                    <li class="nav-item   pcoded-hasmenu">
                      <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-sliders" ></i></span><span class="pcoded-mtext">{{ trans('admin.SliderHome') }}</span></a>
                      <ul class="pcoded-submenu">

                        <li><a style="text-decoration: none" href="{{ route('homeslider') }}"><i  style="font-size:15px; color:cornflowerblue;" class="feather icon-eye"></i>  <span style="font-size: 18px;bottom-left:5px;"> {{ trans('admin.show slider') }}</span></a></li>
                        <li><a style="text-decoration:none;" href="{{ route('add-slider') }}"><i  style="color: green; font-size:20px;"  class="feather icon-plus"></i>  <span style="font-size: 18px;bottom-left:5px;">{{ trans('admin.add slider') }}</span></a></li>
                        {{-- <li><a style="text-decoration:none;" href="{{ url('admin/edit-slider/'.$slider->id) }}"><i style="color: blue;font-size:15px;" class="feather icon-edit"></i> <span style="font-size: 18px;bottom-left:5px;"> Edit Slider</span></a></li>
                        <li><a style="text-decoration:none;" href="{{ route('homeslider') }}" ><i style="color: red; font-size:15px;" class="feather icon-trash"></i> <span style="font-size: 18px; bottom-left:5px;"> Delete Slider</span></a></li>
       --}}
                      </ul> 
                    </li>
                        

                        <li class="nav-item pcoded-hasmenu">
                          <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-percent"></i></span><span class="pcoded-mtext">{{ trans('admin.Coupon') }}</span></a>
                          <ul class="pcoded-submenu">

                            <li><a style="text-decoration: none" href="{{ route('homecoupon') }}"><i  style="font-size:15px; color:cornflowerblue;" class="feather icon-eye"></i>  <span style="font-size: 18px;bottom-left:5px;"> {{ trans('admin.show coupon') }}</span></a></li>
                            <li><a style="text-decoration:none;" href="{{ route('add-coupon') }}"><i  style="color: green; font-size:20px;"  class="feather icon-plus"></i>  <span style="font-size: 18px;bottom-left:5px;">{{ trans('admin.add coupon') }}</span></a></li>
          
                          </ul> 
                        
                        
                        </li>
                            <li class="nav-item pcoded-hasmenu">
                              <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file"></i></span><span class="pcoded-mtext">{{trans('admin.Reports')}}</span></a>
                              <ul class="pcoded-submenu">
                                <li><a href="{{route('order-reports')}}">تقرير طلبات العملاء</a></li>
                                <li><a href="{{route('customer-reports')}}">تقرير العملاء</a></li>
                                <li><a href="{{route('order-tracking-reports')}}">تقرير شحن الطلبات</a></li>
                                <li><a href="{{route('order-cancelled-reports')}}">تقرير الطلبات المرجعة</a></li>
                                <li><a href="{{route('products-out-of-stock')}}">تقرير المنتجات التي نفذت </a></li>
                                <li><a href="{{route('product-salles')}}">تقرير المنتجات  </a></li>
                                <li><a href="{{route('total-salles')}}">تقرير اجمالي المبيعات  </a></li>
                              </ul>
                            </li>

                        <li class="nav-item pcoded-hasmenu">
                         
                         <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-mail" ></i></span><span class="pcoded-mtext">{{trans('admin.Email')}} </span></a>
                         <ul class="pcoded-submenu">
                          <li><a href="email_inbox.html">Inbox</a></li>
                          <li><a href="email_read.html">Read mail</a></li>
                          <li><a href="{{ aurl('admin/email') }}">Compose mail</a></li>
                        </ul>
                  
                        </li>
                        <li class="nav-item pcoded-hasmenu">
                          <a href="{{route('reviews')}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-thumbs-up"></i></span><span class="pcoded-mtext">{{ trans('admin.FeedBack') }}</span></a>
                            </li>
      </ul>
    
  </div>
</nav>