<x-backend>
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title"> Book </h4>
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
					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<h4 class="card-title"> List </h4>

								<a class="btn btn-primary btn-round ms-auto" href="{{ route('book.create') }}">
									<i class='bx bx-plus' ></i>
									Add New
								</a>
							</div>
						</div>
						<div class="card-body">
							@if(session('successMsg') != NULL )
							<div class="alert alert-success alert-dismissible fade show" role="alert">
							  	<strong> ✅ SUCCESS!</strong>
							  	{{ session('successMsg') }}
							  	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>
							@endif

							<div class="table-responsive">
								<table id="add-row" class="display table table-striped table-hover" >
									<thead>
										<tr>
											<th>#</th>
											<th> Title </th>
											<th> Author </th>
											<th> Genre </th>
											<th style="width: 350px">Action</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>#</th>
											<th> Title </th>
											<th> Author </th>
											<th> Genre </th>
											<th>Action</th>
										</tr>
									</tfoot>
									<tbody>
										@php $i=1; @endphp
										@foreach($books as $book)
											<tr>
												<td> {{ $i++ }} </td>
												<td>
													{{ $book->title }} 
													<small> ( {{ $book->mmtitle }} ) </small>
												</td>
												<td>
													{{ $book->author->name }}
												</td>
												<td>
													@foreach($book->genres as $genre)
														<span class="badge rounded-pill bg-secondary">{{ $genre->name }}</span>
													@endforeach
												</td>
												<td>
													<a href="{{ route('book.edit',$book->id) }}" class="btn btn-info">
														<span class="btn-label">
															<i class="icofont-info"></i>
														</span>
														Detail
													</a>


													<a href="{{ route('book.edit',$book->id) }}" class="btn btn-warning">
														<span class="btn-label">
															<i class="icofont-ui-settings"></i>
														</span>
														Edit
													</a>

													<form class="d-inline-block" action="{{ route('book.destroy',$book->id) }}" method="POST" onsubmit="return confirm('Are you sure want to delet?')">
														@csrf
														@method('DELETE')
														<button class="btn btn-outline-danger">
															<span class="btn-label">
																<i class="icofont-trash"></i>
															</span>
															Remove
														</button>
													</form>

												</td>
											</tr>

										@endforeach

									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</x-backend>