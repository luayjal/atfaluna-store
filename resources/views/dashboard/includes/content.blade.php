 {{-- <!-- [ Main Content ] start -->
 <div class="row" >
    <!-- subscribe start -->
    
    <div class="col-md-6 col-lg-4">
        <div class="card">
            <div class="card-body text-center">
                <i class=""><img src="icons/orders.png" width="60px" height="60px"/></i>
                <h4 class="m-t-20"><span class=""> {{ trans('admin.Orders') }}</span></h4>
               
                <button class="btn btn-dark btn-sm btn-round">{{trans ('What\'s new!') }}</button>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-lg-4">
        <div class="card">
            <div class="card-body text-center">
                <i class=""><img src="icons/customer.png" width="60px" height="60px"/></i>
                <h4 class="m-t-20"><span class="text-c-blue"></span> {{ trans('admin.Customers') }}</h4>
                
                <button class="btn btn-dark btn-sm btn-round">show customers</button>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4" >
        <div class="card">
            <div class="card-body text-center">
                <i class=""><img src="icons/feedback.png" width="60px" height="60px"/></i>
                <h4 class="m-t-20">FeedBack</h4>
               
                <button class="btn btn-dark btn-sm btn-round">FeedBack me</button>
            </div>
        </div>
    </div> --}}
    <!-- [ Main Content ] start -->

        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- customar project  start -->
            
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center ">
                            <div class="col-auto">
                            </div>
                            <div  class="col-auto">
                                <a style="text-decoration: none" href="">
                                    &nbsp; &nbsp; &nbsp; <i   class="  feather icon-shopping-cart" style="color:#0090E7; font-size:30px; margin-bottom:7px;"></i>
            
                                <br>
                                <h3 style="color: #0090E7" class="m-b-4">{{ trans('admin.Orders') }}</h3>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center ">
                            <div class="col-auto">
                            </div>
                            <div class="col-auto">
                                <a style="text-decoration: none;" href="{{ route('categories')}}">
                                    &nbsp; &nbsp; &nbsp;    <i class="feather icon-list" style="color:#0090E7; font-size:30px; text-align:center;"></i>
                                <h3 style="color: #0090E7" class="m-b-4">{{ trans('admin.Categories') }}</h3>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center ">
                            <div class="col-auto">
                               
                            </div>
                            <div class="col-auto">

                                <a style="text-decoration: none" href="{{ route('products') }}">
                                    &nbsp; &nbsp; &nbsp;&nbsp; <img style="width:30px" src="/Ico/2.png" alt="">

                                <h3 style="color: #0090E7" class="m-b-4">{{ trans('admin.Products') }}</h3>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div  class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center ">
                            <div class="col-auto">
                              
                            </div>
                            <div class="col-auto">
                                <a style="text-decoration: none" href="">
                                   
                                    &nbsp; &nbsp; &nbsp;  <i class="feather icon-file" style="text-align: center;font-size:30px;color:#0090E7"></i>
                                <h3 style="color: #0090E7"  class="m-b-4">{{ trans('admin.Reports') }}</h3>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>