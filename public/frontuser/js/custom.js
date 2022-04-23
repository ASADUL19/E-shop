    $(document).ready(function(){
    	
    	loadwishlist();
		$('.addtocartbtn').click(function(e){
			e.preventDefault();

			var product_id=$(this).closest('.prod_data').find('.prod_id').val();
			var product_qty=$(this).closest('.prod_data').find('.qty_input').val();



			$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});



			$.ajax({
				method:"POST",
				url:"/add-to-cart",
				data:
				{
					'product_id':product_id,
					'product_qty':product_qty,
				},
				success:function(response)
				{
					swal(response.status);
				}
			});
		});

		function loaadcart()
		{
			$.ajax({
				method:"GET",
				url:"/show-cart-data",
				success:function(response)
				{
					$('.cartcount').html('');
					$('.cartcount').html(response.count);
				}
			});
		}

		function loadwishlist()
		{
			$.ajax({
				method:"GET",
				url:"/show-wishlist-data",
				success:function(response)
				{
					$('.wishlistcount').html('');
					$('.wishlistcount').html(response.count);
				}
			});
		}

		$('.addtowishlist').click(function(e){
			e.preventDefault();

			var product_id=$(this).closest('.prod_data').find('.prod_id').val();
			$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
			$.ajax({
				method:"POST",
				url:"/add-to-wishlist",
				data:
				{
					'product_id':product_id,
					
				},
				success:function(response)
				{
					swal(response.status);
				}
			});

		});
		$(document).on('click','.increment_btn',function(e){
			e.preventDefault();

			
			var inc_value=$(this).closest('.prod_data').find('.qty_input').val();
			var value=parseInt(inc_value,10);
			value=isNaN(value) ? 0 : value;
			if(value<10)
			{
				value++;
				$(this).closest('.prod_data').find('.qty_input').val(value);

			}
		});

		$(document).on('click','.decrement_btn',function(e){
			e.preventDefault();

			var dec_value=$(this).closest('.prod_data').find('.qty_input').val();
			var value=parseInt(dec_value,10);
			value=isNaN(value) ? 0 : value;
			if(value>1)
			{
				value--;
				$(this).closest('.prod_data').find('.qty_input').val(value);

			}
		});


		$(document).on('click','.delete-cart-item',function(e)
		{
			e.preventDefault();

			$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});


			var prod_id=$(this).closest('.product_data').find('.prod_id').val();
			$.ajax({
				method:"POST",
				url:"delete-cart-item",
				data:{
					'prod_id':prod_id,
				},
				success:function(response)
				{
					loaadcart();
					$('.cartitem').load(location.href + " .cartitem");
					swal("" ,response.status ,"success");
				}
			});
		});


		$(document).on('click','.changequantity',function(e){
			e.preventDefault();
			$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});


			var prod_id=$(this).closest('.product_data').find('.prod_id').val();
			var qty=$(this).closest('.product_data').find('.qty_input').val();

			$.ajax({
					method:"POST",
					url:"update-qty",
					data:{
						'prod_id':prod_id,
						'prod_qty':qty,
					},
					success:function(response)
					{
						$('.cartitem').load(location.href + " .cartitem");
						swal("",response.status,"success");
					}
			});
		});


	});
