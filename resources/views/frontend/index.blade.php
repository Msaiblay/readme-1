<x-frontend>
	<!-- ======= Icon Boxes Section ======= -->
    <section id="icon-boxes" class="icon-boxes">
	    <div class="container">


	        <div class="row">
	    		@for($i=4; $i<=7; $i++)

	          	<div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up">
	            	<div class="icon-box">
	              		<div class="icon">
	              			<a href="">
	              				<img src="{{ $data[0][$i]->coverphoto }}" class="img-fluid mx-auto d-block bookcover">
	              			</a>
	              		</div>
	              		<h4 class="title"><a href=""> {{ $data[0][$i]->title }} </a></h4>
          				<p class="fst-italic text-muted"> - <span> {{ $data[0][$i]->author->name }} </span> - </p>

	              		<p class="description"> {{ $data[0][$i]->annotation }} </p>
	            	</div>
	          	</div>
	       		@endfor

	        </div>


	    </div>
    </section>
    <!-- End Icon Boxes Section -->

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
	    <div class="container" data-aos="fade-up">

	        <div class="section-title">
	          	<h2> Browse Genres </h2>
	          	<p> <a href="genres.html"> View All <i class="icofont-dotted-right"></i></a> </p>

	        </div>

	    	<section id="clients" class="clients">

		        <div class="content owl-carousel clients-carousel">
		        	@foreach($genres as $genre)
		            	<a href="#" class="btn-learn-more"> {{ $genre->name }} </a>

		            @endforeach
	        	</div>

	        </section>
	    </div>
    </section>
    <!-- End About Us Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
	    <div class="container-fluid">

	        <div class="row">

	          	<div class="col-lg-12 d-flex flex-column justify-content-center align-items-stretch" data-aos="fade-left">

		            <div class="content text-center mb-5">
		              	<h3> Top Best Seller </h3>
		            </div>

		            <div class="accordion-list">
		              	<ul>
		              		@php $i =1; @endphp
		              		@foreach($topbooks as $key => $topbook)
			                <li data-aos="fade-up" data-aos-delay="100">
			                  	<a data-bs-toggle="collapse" class="@if($key == 0) collapse @else collapsed @endif" data-bs-target="#accordion-list-{{ $topbook->id }}">
			                  		<span>0{{ $i++ }}</span> 
			                  		{{ $topbook->title }}
			                  		<small class="fst-italic text-muted ms-3"> ~ {{ $topbook->author->name }} </small>
			                  		<i class="bx bx-chevron-down icon-show"></i>
			                  		<i class="bx bx-chevron-up icon-close"></i>
			                  	</a>
			                  	<div id="accordion-list-{{ $topbook->id }}" class="collapse @if($key == 0) show @endif" data-bs-parent=".accordion-list">
			                    	<p class="grey mt-3">
			                      		{{ $topbook->annotation }}
			                    	</p>
			                  	</div>
			                </li>

			                @endforeach

		              	</ul>
		            </div>

	          	</div>

	        </div>

	    </div>
    </section>
    <!-- End Why Us Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
	    <div class="container" data-aos="fade-up">

	        <div class="section-title">
	          	<h2> New Arrivals </h2>
	          	<p> <a href="books.html"> View All <i class="icofont-dotted-right"></i></a> </p>

	        </div>

	        <div class="row gx-5">
	        	@foreach($newbooks as $newbook)
	          	<div class="col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
	          		<div class="row icon-box">
	          			<div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12">
		              		<img src="{{ $newbook->coverphoto }}" class="img-fluid">
	          			</div>
	          			<div class="col-xl-9 col-lg-9 col-md-8 col-sm-12 col-12">
	          				<h4 class="ms-0 mst-3"><a href="#"> {{ $newbook->title }} </a></h4>
		              		<p class="ms-0"> {{ $newbook->annotation }} </p>
	          			</div>
	          		</div>
	          	</div>

	          	@endforeach

	    	</div>
	    </div>
    </section>
    <!-- End Services Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
      	<div class="container" data-aos="fade-up">

	        <div class="section-title">
	          	<h2> Popular Classics </h2>
	          	<p> <a href="books.html"> View All <i class="icofont-dotted-right"></i></a> </p>

	        </div>

	        <div class="row gx-5">

	        	@foreach($randombooks as $randombook)
	          	<div class="col-lg-6 mb-5" data-aos="fade-up" data-aos-delay="100">
		            <div class="member d-flex align-items-start">
		              	<div class="pic">
		              		<a href="">
		              			<img src="{{ $randombook->coverphoto }}" class="img-fluid" alt="">
		              		</a>
		              	</div>
		              	<div class="member-info">
		                	<a href="">
		                		<h4> {{ $randombook->title }} </h4>
		                	</a>
		                	<a href="">
			                	<span> {{ $randombook->author->name }} </span>
			                </a>
		                	<p>  {{ $randombook->annotation }} </p>
		              </div>
		            </div>
	          	</div>

	          	@endforeach

	        </div>

      	</div>
    </section>
    <!-- End Team Section -->

    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
	    <div class="container" data-aos="fade-up">

	        <div class="section-title">
	          	<h2> Free Book </h2>
	          	<p> <a href=""> View All <i class="icofont-dotted-right"></i></a> </p>
	        </div>

	        <div class="row">

	        	@foreach($freebooks as $freebook)
	          	<div class="col-lg-3 col-md-6 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
		            <div class="box">
		              	<h3> {{ $freebook->title }} </h3>
		              	
		              	<img src="{{ $freebook->coverphoto }}" class="img-fluid bookcover">

		              	<div class="btn-wrap">
		                	<a href="#" class="btn-buy"> <i class="icofont-download"></i> Download </a>
		              	</div>
		            </div>
		        </div>
		        @endforeach

	        </div>

	    </div>
    </section>
    <!-- End Pricing Section -->

    
    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients section-bg">
      	<div class="container" data-aos="zoom-in">
      		<div class="section-title">
	          	<h2> Most Visited Authors </h2>
	        </div>

        	<div class="owl-carousel clients-carousel">

        		@foreach($authors as $author)
        		<a href="" class="butFrame">
          			<img src="{{ $author->photo }}" alt="" />
          			<div class="butTextWrap">
			        	<div class="butHeading">{{ $author->name }} </div>
			      	</div>
          		</a>
          		@endforeach

        	</div>

      	</div>
    </section><!-- End Clients Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      	<div class="container" data-aos="fade-up">

	        <div class="section-title mb-5">
	          <h2>Contact Us</h2>
	        </div>

	        <div class="row mt-1 d-flex justify-content-end my-5" data-aos="fade-right" data-aos-delay="100">

	          	<div class="col-lg-4">
		            <div class="info">
		              	<div class="address">
		                	<i class='bx bxs-shopping-bag'></i>
		                	<h4> Safe Shopping </h4>
		                	<p> We reserves the right to refuse or cancel any order placed for a product that is listed at an incorrect price which may be higher or lower than published.
		                	</p>
		              	</div>
		            </div>
		        </div>


		        <div class="col-lg-4">
		            <div class="info">
		              	<div class="address">
		                	<i class='bx bxs-share' ></i>
		                	<h4> 3- DAY RETURN: </h4>
		                	<p> Damaged items should be reported within 3 days of receipt and a replacement delivery will be agreed as soon as possible. </p>
		              	</div>
		            </div>
		        </div>



		        <div class="col-lg-4">
		            <div class="info">
		              	<div class="address">
		                	<i class="icofont-fast-delivery"></i>
		                	<h4> Delivery </h4>
		                	<p>It will takes up to 1 month depend on destination address.</p>
		              	</div>
		            </div>
		        </div>


	        </div>

      	</div>
    </section>
    <!-- End Contact Section -->
</x-frontend>