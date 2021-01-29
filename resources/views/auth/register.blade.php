<x-frontend>


    <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li> Register </li>
                </ol>
                <h2>  Register </h2>
            </div>
        </section>
        <!-- End Breadcrumbs -->

        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog">
            <div class="container">

                <div class="row justify-content-center">
                    <div class="col-xl-8 col-md-10 col-sm-12 col-12">
                        <div class="blog-comments">
                            <div class="reply-form">
                                <h4> Register to your Account</h4>
                                <p>By logging in you agree to the ridiculously long terms that you didn't bother to read </p>

                                @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <x-jet-validation-errors class="mb-4" />
                                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                                </div>
                                @endif

                                <form action="{{ route('register') }}" method="POST">
                                    @csrf

                                    <div class="row">
                                    	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                    		<div class="form-group form-floating">
	                                            <input name="name" type="text" class="form-control" placeholder="Your Email*" id="inputName">

	                                            <label for="inputName" class="ps-4 text-muted"> Your Name * </label>
	                                        </div>
                                    	</div>

                                    	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
											<div class="form-group form-floating">
	                                            <input name="phone" type="number" class="form-control" placeholder="Your Phone*" id="inputPhone">

	                                            <label for="inputPhone" class="ps-4 text-muted"> Your Phone * </label>
	                                        </div>
                                    	</div>
                                        
                                    </div>

                                    <div class="row">

                                    	<div class="col-12">
											<div class="form-group form-floating">
	                                            <input name="email" type="email" class="form-control" placeholder="Your Email*" id="inputEmail">

	                                            <label for="inputEmail" class="ps-4 text-muted"> Your Email * </label>
	                                        </div>
                                    	</div>
                                        
                                    </div>
                                    
                                    <div class="row">
                                    	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
	                                        <div class="col form-group form-floating">
	                                            <input name="password" type="password" class="form-control" placeholder="Password*" id="inputPassword">

	                                            <label for="inputPassword" class="ps-4 text-muted"> Password * </label>
	                                        </div>
	                                    </div>

	                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
	                                        <div class="col form-group form-floating">
	                                            <input name="password_confirmation" type="password" class="form-control" placeholder="Confirm Password*" id="inputconfirmPassword">

	                                            <label for="inputconfirmPassword" class="ps-4 text-muted">Confirm Password * </label>
	                                        </div>
	                                    </div>
                                        
                                    </div>


                                    <div class="row">

                                    	<div class="col-12">
											<div class="form-group form-floating">
	                                            <textarea class="form-control" placeholder="Leave a comment here" id="inputAddress" style="height: 70px" name="address"></textarea>
								  				<label for="inputAddress"> Address</label>
	                                        </div>
                                    	</div>
                                        
                                    </div>
                              
                                    <div class="d-grid gap-2 col-6 mx-auto">
                                        <button type="submit" class="btn btn-primary"> Sign Up </button>
                                    </div>
                                </form>

                            </div>
                      </div>

                    </div>

                </div>

            </div>
        </section>
        <!-- End Blog Section -->


</x-frontend>