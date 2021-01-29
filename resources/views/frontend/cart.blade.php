<x-frontend>

	<!-- ======= Breadcrumbs ======= -->
	    <section id="breadcrumbs" class="breadcrumbs">
	      	<div class="container">

	        	<ol>
	          		<li><a href="index.html">Home</a></li>
	          		<li> Shopping Cart </li>
	        	</ol>
	        	<h2 class="d-inline-block"> Shopping Cart </h2>

	        	<p class="float-end"> <span class="count"> </span> Books in the Bag </p>

	      	</div>
	    </section>
	    <!-- End Breadcrumbs -->

	    <!-- ======= Blog Section ======= -->
	    <section id="blog" class="blog">
	      	<div class="container">

	      		<div class="row mb-5 justify-content-center">

	      			<div class="col-xl-10 col-lg-10 col-md-10 col-sm-12 col-12 shoppingcart_div">
					  	
					  	<div id="cartDiv"></div>


					  	<div class="row justify-content-end">

					  		<div class="col-2">
					  			<p class="pt-4"> Cash on Delivery  </p>
					  		</div>
					  		<div class="col-4 text-end">
					  			<div class="form-floating">
								  	<select class="form-select" id="floatingSelect" aria-label="Floating label select example">
								  		@foreach($shippings as $shipping)
								    		<option value="{{ $shipping->id }}"> {{ $shipping->township->name }} ( {{ number_format($shipping->fee) }} ) Ks </option>
								    	@endforeach
								  	</select>
								  <label for="floatingSelect"> Fill Your Township </label>
								</div>
					  		</div>
					  		<div class="col-xl-4">
					  			<div class="form-floating">
								  	<textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 70px"></textarea>
								  	<label for="floatingTextarea2"> Delivery Address</label>
								</div>
					  		</div>
					  		<hr class="my-3">
					  	</div>

					  	<div class="d-flex flex-xl-row flex-lg-row flex-md-row flex-sm-column flex-column
					  	 bd-highlight justify-content-between mb-3">
						  	<div class="p-2 bd-highlight order-xl-1 order-lg-1 order-md-1 order-sm-2 order-2 justify-content-center">
						  		<a href="" class="more-detail d-block text-center"> Go Shopping </a>
						  	</div>
						  	<div class="p-2 bd-highlight order-xl-2 order-lg-2 order-md-2 order-sm-1 order-1 justify-content-center">
						  		<span class="fs-6 pe-5 text-uppercase"> Subtotal : </span>
						  		<span class="fs-4 persianred_color fw-bold totality"> </span>
						  	</div>
						  	<div class="p-2 bd-highlight order-xl-3 order-lg-3 order-md-3 order-sm-3 order-3 justify-content-center"> 
						  		@guest
						  			{{ session()->put('cartUrl','cart')}}
						  			<a href="{{ route('login') }}" class="order d-block text-center"> Order Confirm </a>
						  		@else
						  			<a href="javascript:void(0)" class="order d-block text-center checkoutBtn"> Order Confirm </a>

						  		@endif
						  	</div>
						</div>


	      			</div>

	      		</div>

	      	</div>
	    </section>
	    <!-- End Blog Section -->

</x-frontend>