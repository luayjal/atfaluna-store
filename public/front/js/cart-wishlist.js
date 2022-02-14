
		$('.js-addwish-b2').on('click', function(e){
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function(){
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function(){
            
            
          //  var form = $('#form_cart').find();
            

			$(this).on('click', function(){
                var formdata = new FormData();

                var attr = $(".sizelabel.active").attr('for');
                var size_id=  $("input[id='" +attr+"']").val();
                formdata.append( 'size_id' , size_id);
    
                var attr = $(".colorlabel.active").attr('for');
                var color_id=  $("input[id='" +attr+"']").val();
                formdata.append( 'color_id' , color_id);
    
              
                var csrf=  $("input[name='_token']").val();
                formdata.append( '_token' , csrf);
    
                var product_id=  $("input[name='product_id']").val();
                formdata.append( 'product_id' , product_id);
    
                var quantity=  $("input[name='quantity']").val();
                formdata.append( 'quantity' , quantity);
                console.log(color_id);
                $.ajax({
                    type: 'post',
                    enctype: 'multipart/form-data',
                    url: "/add-cart",
                    data: formdata,
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function(data) {
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
                    error: function(reject) {
                        swal('', "حدث خطأ بعملية الإضافة", "error");

                    }
                });

			});
		});

