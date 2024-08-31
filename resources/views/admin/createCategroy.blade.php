@extends('layout.admin')

@section('title', 'Create Category')

@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">					
		<div class="container-fluid my-2">
			<div class="row mb-2">
				<div class="col-6">
					<h1>Create Category</h1>
				</div>
				<div class="col-6 text-right">
					<a href="{{ route('categories.index') }}" class="btn btn-primary">Back</a>
				</div>
			</div>
		</div>
		<!-- /.container-fluid -->
	</section>
	<!-- Main content -->
	<section class="content">
		<!-- Default box -->
		<div class="container-fluid">	
			<div class="row">
				<div class="col-md-6 offset-md-3">
					<div class="card">
						<div class="card-body">
							<form action="{{ route('categories.store') }}" method="POST">
								@csrf
								<div class="mb-3">
									<label for="name">Category</label>
									<input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name">
									@error('name')
										<div class="invalid-feedback">{{ $message }}</div>
									@enderror
								</div>
								<div class="pt-3">
									<button class="btn btn-primary">Create</button>
									<a href="{{ route('categories.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
								</div>
							</form>
						</div>							
					</div>
				</div>
			</div>
		</div>
		<!-- /.card -->
	</section>
	<!-- /.content -->
</div>
@endsection