<x-frontend>

	<!-- ======= Breadcrumbs ======= -->
	    <section id="breadcrumbs" class="breadcrumbs">
	      	<div class="container">

	        	<ol>
	          		<li><a href="index.html">Home</a></li>
	          		<li> Books </li>
	        	</ol>
	        	<h2> {{ $book->isbn }} </h2>



	      	</div>
	    </section>
	    <!-- End Breadcrumbs -->

	    <!-- ======= Blog Section ======= -->
	    <section id="blog" class="blog">
      		<div class="container">
      			<div class="row mb-4">
      				<div class="col-12">
      					<h1> {{ $book->title }} </h1>
      				</div>
      			</div>
        		<div class="row">

          			<div class="col-lg-5  col-md-6 col-sm-12 col-12" data-aos="fade-up">
			            <ul id="bk-list" class="bk-list clearfix">
							<li>
								<div class="bk-book book-1 bk-bookdefault">
									<div class="bk-front bk-bookview">
										<div class="bk-cover" style="background-image: url('{{ asset($book->coverphoto) }}'); background-size: cover;">
											
										</div>
										<div class="bk-cover-back"></div>
									</div>
									<div class="bk-page bk-bookview">
										<div class="bk-content bk-content-current">
											<h3> {{ $book->title }} </h3>
											<p class="mt-3"> {{ $book->author->name }}  </p>
										</div>
										<div class="bk-content">
											<p> {{ $book->annotation }} </p>
										</div>
										<div class="bk-content">
											<p> {{ $book->annotation }} </p>
										</div>
									</div>
									<div class="bk-back bk-bookback">
										<p> {{ $book->annotation }} </p>
									</div>
									<div class="bk-right"></div>
									<div class="bk-left bk-bookback">
										<h2>
											<span> {{ $book->title }} </span>
											<span> {{ $book->author->name }} </span>
										</h2>
									</div>
									<div class="bk-top"></div>
									<div class="bk-bottom"></div>
								</div>
								<div class="bk-info">
									<button class="bk-bookback more-detail">Flip</button>
									<button class="bk-bookview more-detail">View Inside</button>
									
								</div>

							</li>
						</ul>
			        </div>

			        <div class="col-lg-7  col-md-6 col-sm-12 col-12 " data-aos="fade-up">
			        	<p> {!! $book->summary !!} </p>

		                    <ul class="list-group list-group-horizontal flex-fill">
							  	<li class="list-group-item border-0 w-25"> ISBN </li>
							  	<li class="list-group-item border-0"> : </li>
							  	<li class="list-group-item border-0"> {{ $book->isbn }}  </li>
							</ul>

		                    <ul class="list-group list-group-horizontal flex-fill">
							  	<li class="list-group-item border-0 w-25"> Author </li>
							  	<li class="list-group-item border-0"> : </li>
							  	<li class="list-group-item border-0"> <a href=""> {{ $book->author->name }} </a>  </li>
							</ul>

							<ul class="list-group list-group-horizontal flex-fill">
							  	<li class="list-group-item border-0 w-25"> Genres </li>
							  	<li class="list-group-item border-0"> : </li>
							  	<li class="list-group-item border-0"> 
							  		<a href=""> ထပ်ရည် </a>  
							  	</li>

							</ul>

							<ul class="list-group list-group-horizontal flex-fill">
							  	<li class="list-group-item border-0 w-25"> No of Pages </li>
							  	<li class="list-group-item border-0"> : </li>
							  	<li class="list-group-item border-0"> {{ $book->pages }}  </li>
							</ul>

							<ul class="list-group list-group-horizontal flex-fill">
							  	<li class="list-group-item border-0 w-25"> Publish Date </li>
							  	<li class="list-group-item border-0"> : </li>
							  	<li class="list-group-item border-0"> {{ $book->publishyear }}  </li>
							</ul>
		                    @if($book->type == 1)

		                    <ul class="list-group list-group-horizontal flex-fill">
							  	<li class="list-group-item border-0 w-25"> Price </li>
							  	<li class="list-group-item border-0"> : </li>
							  	<li class="list-group-item border-0">
							  		@if($book->discount)
							  			<span class="fs-4 persianred_color fw-bold"> 
							  				{{ number_format($book->discount) }} Ks 
							  			</span> 

							  			<del> {{ number_format($book->price) }} Ks </del>

							  		@else 
							  			<span class="fs-4 persianred_color fw-bold"> {{ number_format($book->price) }} Ks </span> 
							  		@endif
							  	</li>
							</ul>

							@endif

		                    <div class="btn-sec mt-3">
		                        <div class="d-grid gap-2 d-md-block">
		                        	@if($book->type == 1)
								  	<button class="buy-now addtocartBtn" data-id="{{ $book->id }}" data-title="{{ $book->title }}" data-author="{{ $book->author->name }}" data-coverphoto="{{ asset($book->coverphoto) }}" data-price="{{ $book->price }}" data-discount="{{ $book->discount }}">
									    <span> Buy Now </span>
									    <div class="cart">
									        <svg viewBox="0 0 36 26">
									            <polyline points="1 2.5 6 2.5 10 18.5 25.5 18.5 28.5 7.5 7.5 7.5"></polyline>
									            <polyline points="15 13.5 17 15.5 22 10.5"></polyline>
									        </svg>
									    </div>
									</button>
									@else

										<a href=""> Download </a>

									@endif
								</div>
		                    </div>
			        </div>
			    </div>


      		</div>
    	</section>
	    <!-- End Blog Section -->

	    <section id="blog" class="blog">
	      	<div class="container">
	      		<div class="row mb-4">
      				<div class="col-12">
      					<h3> You May Also Like This </h3>
      					<hr>
      				</div>
      			</div>
		        
		        <div class="row">

		        	@foreach($relatedbooks as $relatedbook)
			        	<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
			        		<a href="{{ route('frontend.book', $relatedbook->id) }}">
								<ul id="bk-list" class="bk-list clearfix">
									<li>
										<div class="bk-book book-1 bk-bookdefault">
											<div class="bk-front">
												<div class="bk-cover" style="background-image: url('{{ asset($relatedbook->coverphoto) }}'); background-size: cover;">
	  												
	  												@if($book->type == 1)
							  							@if($book->discount)
	  														<label class="price"> {{ number_format($book->discount) }} Ks </label>
	  													@else
	  														<label class="price"> {{ number_format($book->price) }} Ks </label>
	  													@endif
	  												@endif
												</div>
												<div class="bk-cover-back"></div>
											</div>
											
											<div class="bk-right"></div>
											<div class="bk-left">
												<h2>
													<span> {{ $relatedbook->title }} </span>
													<span> {{ $relatedbook->author->name }} </span>
												</h2>
											</div>
											<div class="bk-top"></div>
											<div class="bk-bottom"></div>
										</div>
										<div class="bk-info text-center">

											<div class="d-grid gap-2 d-md-block">
												@if($book->type == 1)
											  	<button class="buy-now addtocartBtn" data-id="{{ $relatedbook->id }}" data-title="{{ $relatedbook->title }}" data-author="{{ $relatedbook->author->name }}" data-coverphoto="{{ asset($relatedbook->coverphoto) }}" data-price="{{ $relatedbook->price }}" data-discount="{{ $relatedbook->discount }}">
												    <span> Buy Now </span>
												    <div class="cart">
												        <svg viewBox="0 0 36 26">
												            <polyline points="1 2.5 6 2.5 10 18.5 25.5 18.5 28.5 7.5 7.5 7.5"></polyline>
												            <polyline points="15 13.5 17 15.5 22 10.5"></polyline>
												        </svg>
												    </div>
												</button>
												@else
												<a href=""> Download </a>
												@endif
											</div>
											<h3>
												<span>Anthony Burghiss</span>
												<span>A Catwork Orange</span>

											</h3>
										</div>
									</li>
								</ul>
							</a>
						</div>
					@endforeach

		        </div>

	      	</div>
	    </section>

</x-frontend>