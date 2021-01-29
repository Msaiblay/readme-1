$(document).ready(function(){
	cartNoti();
	showTable();

	$('.addtocartBtn').on('click', function(){
		var id = $(this).data('id');
		var title = $(this).data('title');
		var author = $(this).data('author');
		var coverphoto = $(this).data('coverphoto');
		var unitprice = $(this).data('price');
		var discount = $(this).data('discount');
		var qty = 1;

		var mylist = {id:id, title:title,
					author:author, coverphoto:coverphoto,
					unitprice:unitprice, discount:discount,
					qty:qty,
					};

		var cart = localStorage.getItem('cart');
		var cartArray;

		if (cart==null) {
			cartArray = Array();
		}
		else{
			cartArray = JSON.parse(cart);
		}

		var status=false;

		$.each(cartArray, function(i,v){
			if (id == v.id) {
				v.qty++;
				status = true;
			}
		});

		if (!status) {
			cartArray.push(mylist);
		}

		var cartData = JSON.stringify(cartArray);
		localStorage.setItem("cart",cartData);

		cartNoti();

	});

	function cartNoti(){
		var cart = localStorage.getItem('cart');
		if (cart) {
			var cartArray = JSON.parse(cart);
			var total =0;
			var noti = 0;
			$.each(cartArray, function(i,v){

				var unitprice = v.price;
				var discount = v.discount;
				var qty = v.qty;
				if (discount) {
					var price = discount;
				}
				else{
					var price = unitprice;
				}
				var subtotal = price * qty;

				noti += qty ++;
				total += subtotal ++;
			})
			$('.count').html(noti);
		}
		else{
			$('.count').html(0);
		}
	}

	function showTable(){
		var cart = localStorage.getItem('cart');

		if (cart) {
			$('.shoppingcart_div').show();
			// $('.noneshoppingcart_div').hide();

			var cartArray = JSON.parse(cart);
			var shoppingcartData='';


			if (cartArray.length > 0) {
				var total = 0;
				$.each(cartArray, function(i,v){
					var id = v.id;
					var title = v.title;
					var author = v.author;
					var unitprice = v.unitprice;
					var discount = v.discount;
					var coverphoto = v.coverphoto;
					var qty = v.qty;
					
					var str_unitprice = CommaFormatted(unitprice.toString());
                    var str_discount = CommaFormatted(discount.toString());


					if (discount) {
						var price = discount;
					}
					else{
						var price = unitprice;
					}
					var subtotal = price * qty;
                    var str_subtotal = CommaFormatted(subtotal.toString());


					shoppingcartData += `<div class="row gy-5 card-item">
					    	<div class="col-xl-4 col-xl-4 col-md-4 col-sm-12 col-12">
					      		<div class="book-container">
								  <div class="book">
								    <img alt="" src="${coverphoto}" class="img-fluid" />
								  </div>
								</div>
					    	</div>
					    	<div class="col-xl-4 col-xl-4 col-md-4 col-sm-12 col-12 d-flex align-content-around flex-wrap">
					      		<div class="card-body ">
					        		<h5 class="card-title py-3"> ${title} </h5>
					        		<p class="card-text">
					        			<small class="text-muted"> ${author} </small>
					        		</p>`;
					if (discount > 0) {

					    shoppingcartData += `<p class="fs-5 persianred_color fw-bold"> ${str_discount} Ks 
					    						<small> <del class="text-muted"> ${str_unitprice} Ks </del> </small>
					    					</p>`;
					}else{
					    shoppingcartData += `<p class="fs-5 persianred_color fw-bold"> ${str_unitprice} Ks </p>`;

					}
					shoppingcartData += `</div>
					    	</div>

					  		<div class="col-xl-2 col-xl-2 col-md-2 col-sm-6 col-6 d-flex align-content-around flex-wrap mt-0">
					  			<div class="quantity-control " data-quantity="">
								    <button class="quantity-btn dec" data-quantity-minus="" data-id="${i}">
								    	<i class='bx bx-minus' ></i>
								    </button>
								    <input type="number" class="quantity-input" data-quantity-target="" value="${qty}" step="1" min="1" max="" name="quantity" disabled="">
								    <button class="quantity-btn inc" data-quantity-plus="" data-id="${i}">
								    	<i class='bx bx-plus' ></i>
								    </button>
								</div>
								<p> ${str_subtotal} Ks </p>
					  		</div>

					  		<div class="col-xl-2 col-xl-2 col-md-2 col-sm-6 col-6 d-flex align-content-around flex-wrap justify-content-center mt-0">
					  			<a href="javascript:void(0)" class="fs-3 text-danger ml-5 remove_btn"data-id="${i}">
					  				<i class='bx bx-trash-alt'></i>
					  			</a>
					  		</div>
					  	</div>

					  	<hr>`;
						
					total += subtotal ++;
				});
				console.log(total);

				$('#cartDiv').html(shoppingcartData);
				$('.totality').html(CommaFormatted(total.toString())+' Ks');


			}
			else{
				$('.shoppingcart_div').hide();
				$('.noneshoppingcart_div').show();
			}
		}
		else{
			$('.shoppingcart_div').hide();
			$('.noneshoppingcart_div').show();
		}
	}

	// Add Quantity
	$('#cartDiv').on('click','.inc', function()
	{
		var id = $(this).data('id');

		console.log(id);

		var cart=localStorage.getItem("cart");
		var cartArray = JSON.parse(cart);
		
		$.each(cartArray,function (i,v) 
		{
			console.log(i);
			if (i == id) 
			{
				v.qty++;
			}
		})
		
		var cartData = JSON.stringify(cartArray);
		localStorage.setItem('cart',cartData);
		showTable();
		cartNoti();

	});

	// Sub Quantity
	$('#cartDiv').on('click','.dec', function()
	{
		var id = $(this).data('id');

		var cart=localStorage.getItem("cart");
		var cartArray = JSON.parse(cart);
		
		$.each(cartArray,function (i,v) 
		{
			if (i == id) 
			{
				v.qty--;
				if (v.qty == 0) 
				{
					cartArray.splice(id,1);
				}
			}
		})
		
		var cartData = JSON.stringify(cartArray);
		localStorage.setItem('cart',cartData);
		showTable();
		cartNoti();

	});

	// Remove Item
	$('#cartDiv').on('click','.remove_btn', function()
	{
		var id = $(this).data('id');

		console.log(id);

		var cart=localStorage.getItem("cart");
		var cartArray = JSON.parse(cart);

		$.each(cartArray,function (i,v) 
		{
			if (i == id) 
			{
				cartArray.splice(id,1);
			}
		})

		var cartData=JSON.stringify(cartArray);

		localStorage.setItem("cart",cartData);
		
		showTable();
		cartNoti();

	});


	$('.checkoutBtn').on('click', function(){
		var cart = localStorage.getItem('cart');

		var cartArray = JSON.parse(cart);

		var deliveryAddress = $('#floatingTextarea2').val();
		var shippingId = $('#floatingSelect').val();

		var totalAmount =0;
		var totalBook = 0;
		$.each(cartArray, function(i,v){

			var unitprice = v.price;
			var discount = v.discount;
			var qty = v.qty;
			if (discount) {
				var price = discount;
			}
			else{
				var price = unitprice;
			}
			var subtotal = price * qty;

			totalBook += qty ++;
			totalAmount += subtotal ++;
		})

		$.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	    });

	    $.post('/storeorder',{
	    	carts:cart, deliveryAddress:deliveryAddress, shippingId:shippingId,
	    	totalBook:totalBook, totalAmount:totalAmount
	    },function(response){
	    	// localstorage clear
	    	localStorage.clear();
	    	location.href="ordersuccess";
	    })
	});



	function CommaFormatted(amount) 
    {
        var delimiter = ","; // replace comma if desired
        var a = amount.split('.',2)
        var i = parseInt(a[0]);
        
        if(isNaN(i)) 
        {
            return ''; 
        }
        
        var minus = '';
        
        if(i < 0) 
        {
            minus = '-'; 
        }
        
        i = Math.abs(i);
        var n = new String(i);

        var a = [];
        
        while(n.length > 3) {
            var nn = n.substr(n.length-3);
            a.unshift(nn);
            n = n.substr(0,n.length-3);
        }

        if(n.length > 0) 
        { 
            a.unshift(n); 
        }
        n = a.join(delimiter);

        amount = minus + amount;

        // console.log(n);

        return n;

    }
});