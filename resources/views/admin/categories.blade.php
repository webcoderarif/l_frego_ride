@extends('layout.admin')

@section('title', 'Categories')

@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">					
		<div class="container-fluid my-2">
			<div class="row mb-2">
				<div class="col-6">
					<h1>Categories</h1>
				</div>
				<div class="col-6 text-right">
					<a href="{{ route('categories.create') }}" class="btn btn-primary">Add Category</a>
				</div>
			</div>
		</div>
		<!-- /.container-fluid -->
	</section>
	<!-- Main content -->
	<section class="content">
		<!-- Default box -->
		<div class="container-fluid">
			<div class="card">
				<div class="card-body table-responsive p-0">								@if(Session::has('success'))
						<div class="alert alert-success">{{ Session::get('success') }}</div>
					@endif
					<table class="table table-hover text-nowrap">
						<thead>
							<tr>
								<th>Serial</th>
								<th>Name</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@if($categories->isNotEmpty())
								@php
									$serial = 1;
								@endphp

								@foreach($categories as $category)
									<tr>
										<td>{{ $serial++; }}</td>
										<td>{{ $category->name }}</td>
										<td>
											<a class="btn btn-warning btn-sm" href="{{ route('categories.edit', $category->id) }}">
												Edit
											</a>
											<form class="d-inline-block ml-2" action="{{ route('categories.destroy', $category->id) }}" method="POST">
												@csrf
												@method('DELETE')
												<input type="submit" value="Delete" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete?');">
											</form>
										</td>
									</tr>
								@endforeach
							@else
								<tr>
									<td colspan="3">No categories found!</td>
								</tr>
							@endif
						</tbody>
					</table>										
				</div>
				<div class="card-footer clearfix">
					<ul class="pagination pagination m-0 float-right">
					  <li class="page-item"><a class="page-link" href="#">«</a></li>
					  <li class="page-item"><a class="page-link" href="#">1</a></li>
					  <li class="page-item"><a class="page-link" href="#">2</a></li>
					  <li class="page-item"><a class="page-link" href="#">3</a></li>
					  <li class="page-item"><a class="page-link" href="#">»</a></li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /.card -->
	</section>
	<!-- /.content -->
</div>
@endsection