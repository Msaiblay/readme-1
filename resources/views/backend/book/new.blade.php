<x-backend>

	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title"> Create New Book </h4>
				<ul class="breadcrumbs">
					<li class="nav-home">
						<a href="#" class="text-decoration-none">
							<i class='bx bx-home-alt' ></i>
						</a>
					</li>
					<li class="separator">
						<i class="icofont-rounded-right"></i>
					</li>
					<li class="nav-item">
						<a href="#" class="text-decoration-none">Book</a>
					</li>
					<li class="separator">
						<i class="icofont-rounded-right"></i>
					</li>
					<li class="nav-item">
						<a href="#" class="text-decoration-none"> List </a>
					</li>
				</ul>	
			</div>
			<div class="row">
				<div class="col-md-12">

					<form action="{{ route('book.store') }}" method="POST" enctype="multipart/form-data">
						@csrf

						<div class="card">
							<div class="card-header">
								<div class="d-flex align-items-center">
									<h4 class="card-title">New Book Form </h4>
									<a class="btn btn-outline-primary btn-round ms-auto" href="{{ route('book.index') }}">
										<i class="icofont-rounded-double-left"></i>
										Go Back
									</a>
								</div>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-md-12 col-lg-12">
										<div class="form-group">
											<label for="isbn"> ISBN </label>
											<input type="text" class="form-control" id="isbn" placeholder="Enter Book's Title " name="isbn">

										</div>

										<div class="row form-group">

											<div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 form-group">
												<label for="title"> Title </label>
												<input type="text" class="form-control" id="title" placeholder="Enter Book's Title " name="title">

											</div>

											<div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 form-group">
												<label for="mmtitle"> Myanmar Title </label>
												<input type="text" class="form-control" id="mmtitle" placeholder="Enter Book's Myanmar Title " name="mmtitle">
											</div>


											<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12 form-group">
												<label for="page"> Books's Total Pages </label>
												<input type="number" class="form-control" id="page" placeholder="Book's Page " name="page">
											</div>

										</div>
										<div class="row form-group">
											<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
												<div class="form-group">
													<label for="isbn"> Annotation </label>
													<input type="text" class="form-control" id="isbn" placeholder="Enter Book's Annotation " name="annotation">

												</div>
											</div>

											<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
												<div class="form-group">
													<label for="isbn"> Publish Year </label>
													<input type="text" class="form-control" id="isbn" placeholder="Enter Book's Publish Year " name="publishyear">

												</div>
											</div>
										</div>

										<div class="form-group">
											<label for="name"> Book's Cover </label>
											<input type="file" name="photo" class="form-control">
										</div>

										<div class="form-group">
											<label> Language </label>
											<select class="form-control select2" name="languagesid">
												<option value="0"> Choose Book's Language </option>
												@foreach($languages as $language)
													<option value="{{ $language->id }}"> {{ $language->name }} </option>
												@endforeach
											</select>

										</div>


										<div class="form-group">
											<label> Author's Name </label>
											<select class="form-control select2" name="authorsid">
												<option value="0"> Choose Author's Name </option>
												@foreach($authors as $author)
													<option value="{{ $author->id }}"> {{ $author->name }} </option>
												@endforeach
											</select>

										</div>

										<div class="form-group">
											<label> Genre's Name </label>
											<select class="form-control select2" name="genresid[]" multiple="">
												<option value="0"> Choose Genre </option>
												@foreach($genres as $genre)
													<option value="{{ $genre->id }}"> {{ $genre->name }} </option>
												@endforeach
											</select>

										</div>

										<div class="form-group">
											<label for="name"> Book's Status </label>
												<ul class="nav nav-pills nav-primary" id="pills-tab" role="tablist">
												<li class="nav-item">
													<a class="nav-link active" id="pills-price-tab" data-bs-toggle="pill" href="#pills-price" role="tab" aria-controls="pills-price" aria-selected="true"> Price </a>
												</li>
												<li class="nav-item">
													<a class="nav-link" id="pills-free-tab" data-bs-toggle="pill" href="#pills-free" role="tab" aria-controls="pills-free" aria-selected="false"> Free </a>
												</li>
											</ul>
											<div class="tab-content mt-2 mb-3" id="pills-tabContent">
												<div class="tab-pane fade show active" id="pills-price" role="tabpanel" aria-labelledby="pills-price-tab">
													<div class="row form-group">
														<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
															<label for="price"> Price </label>
															<input type="number" name="price" class="form-control" placeholder="Enter Book's Price" id="price">
														</div>

														<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
															<label for="discount"> Discount </label>
															<input type="number" name="discount" class="form-control" placeholder="Enter Book's Discount" id="discount">
														</div>

													</div>
												</div>
												<div class="tab-pane fade" id="pills-free" role="tabpanel" aria-labelledby="pills-free-tab">
													<input type="file" name="pdf" class="form-control">
													<small> Please Upload Book's PDF file </small>
												</div>
											</div>
										</div>

										<div class="form-group">
											<label for="summernote"> Book's Description </label>
											<textarea class="form-control" id="summernote" name="description" rows="5"></textarea>
											
										</div>
									
									</div>
									
								</div>
							</div>
							<div class="card-action">
								<button type="submit" class="btn btn-primary"> 
									<i class="fas fa-save"></i> Save
								</button>
								<button type="reset" class="btn btn-danger">
									<i class="fas fa-times"></i>Cancel
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

</x-backend>