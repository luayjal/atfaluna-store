<x-front-layout>

	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
				الرئيسية
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				 المفضلة
			</span>
		</div>
	</div>
		

	<!-- Shoping Cart -->
		
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div style="margin-left: -300px;margin-right: -300px" class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">المنتج</th>
									<th class="column-2">اسم المنتج</th>
									<th class="column-3">السعر</th>
									<th class="column-4">الكمية</th>
									<th class="column-5">اللون</th>
                                    <th class="column-5">المقاس</th>

								</tr>
							@foreach ($wishlists as $wishlist)
							@csrf
								<tr class="table_row">
									<td class="column-1">
										<div class="how-itemcart1">
											<img src="{{$wishlist->product->image_url}}" alt="IMG">
										</div>
									</td>
									<td class="column-2">{{$wishlist->product->name}}</td>
									<td class="column-3">{{$wishlist->product->price}} ر.س</td>
									<td class="column-4">
										
										<div class="wrap-num-product flex-w m-r-auto m-l-0">
											<div class=" btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>
											<input class="quantity mtext-104 cl3 txt-center num-product" type="number" name="quantity" value="1">
	
											<div class=" btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>
									</td>
                                    <td class="">
										
                                        <div class="flex-w flex-r-m p-b-10">
                                           
                                            <div class="size-204 respon6-next">
            
                                                <div class="container-fluid">
            
                                                    <div class="btn-group btn-group-toggle"  data-toggle="buttons">
                                                    <select class="color_id" name="color_id" id="">
														@foreach ($wishlist->product->colors as $color)
														<option class="color_id" value="{{$color->id}}">{{$color->name}}</option>
														@endforeach
													</select>
                                                    </div>
            
                                                </div>
                                            </div>
                                        </div>
									</td>	
                                    
                                    

                                    <td>	<div class="flex-w flex-r-m p-b-10">
                                      
        
                                        <div class="size-204 respon6-next">
        
                                            <div class="container-fluid">
        
                                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
													<select class="size_id" name="size_id" id="">
														@foreach ($wishlist->product->sizes as $size)

														<option class="size_id" value="{{$size->id}}">{{$size->name}}</option>
                                                     @endforeach
													</select>
        
                                                </div>
                                                
                                            </div>
        
                                            
                                        </div>
                                    </div>
								</td>
								<td>

									<input class="product_id" name="product_id" type="hidden"  value="{{$wishlist->product->id}}">

									<a  class="add_cart flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 ">
										أضف الى العربة
									</a>
								</td>
                                	</tr>

                                @endforeach


							</table>
						</div>

					
					</div>
				</div>

			
			</div>
		</div>
	</form>
	@push('js')

	<script>

$(document).ready(function() {
						var product_id;
						var size_id;
						var color_id;
						var quantity;
		
						
		
		$('.add_cart').click(function(e) {
		e.preventDefault();
		
		$(this).siblings().each(function(){
			if($(this).hasClass("product_id")){
				product_id = $(this).val();
				console.log(product_id);
			}
			if($(this).hasClass("quantity")){
				quantity = $(this).val();
				console.log(quantity);
			}
			if($(this).hasClass("size_id")){
				size_id = $(this).val();
				console.log(size_id);
			}
			if($(this).hasClass("color_id")){
				color_id = $(this).val();
				console.log(color_id);
			}
		
		});


						$.ajax({
						url: "/add-cart",
						type:"POST",
						data:{
							"_token": "{{ csrf_token() }}",
							quantity:quantity,
							product_id:product_id,
							color_id:color_id,
							size_id:size_id,
						},
						success:function(data){
							console.log(data);
							console.log(data);
                        
                        $('.js-show-cart').attr('data-notify',data.count);
                        swal(data.product.name,"تم الاضافة للعربة بنجاح", "success");
                        $('.carts').append(` <li class="header-cart-item flex-w flex-t m-b-12">
                        <div class="header-cart-item-img">
                            <img src="${data['product']['image_url']}" alt="IMG">
                        </div>
                        
                        <div class="header-cart-item-txt p-t-8">
                            <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                            ${data['product']['name']}
                            </a>
    
                            <span class="header-cart-item-info">
                            ${data['cart']['quantity']}×  ${data['product']['price']} رس
                            </span>
                        </div>
                    </li>`);
                    $(".totalPrice").text("");
                    $(".totalPrice").text( ' المجموع :'+ data['totalPrice']+"ر.س");
							
						
		
						},
						});
						});
		
					});
				


	</script>


	@endpush

	

	
		
</x-front-layout>
