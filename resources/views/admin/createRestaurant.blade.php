@extends('layout.admin')

@section('title', 'Create Restaurant')

@section('style')
	<style>
		#blah {
			width: 200px;
		    margin-top: 10px;
		    border: 1px solid skyblue;
		    display:  none;
		}
	</style>	
@endsection

@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">					
		<div class="container-fluid my-2">
			<div class="row mb-2">
				<div class="col-6">
					<h1>Create Restaurant</h1>
				</div>
				<div class="col-6 text-right">
					<a href="{{ route('restaurants.index') }}" class="btn btn-primary">Back</a>
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
						@if(Session::has('status'))
							<div class="alert alert-success">{{ Session::get('status') }}</div>
						@endif
						<div class="card-body">
							<form action="{{ route('restaurants.store') }}" method="POST" enctype="multipart/form-data">
								@csrf
								<div class="mb-3">
									<label for="name">Name</label>
									<input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" value="{{ old('name') }}" required>
									@error('name')
										<div class="invalid-feedback">{{ $message }}</div>
									@enderror
								</div>
								<div class="mb-3">
									<label for="address">Address</label>
									<textarea name="address" id="address" class="form-control @error('address') is-invalid @enderror" placeholder="Address" required>{{ old('address') }}</textarea>
									@error('address')
										<div class="invalid-feedback">{{ $message }}</div>
									@enderror
								</div>
								<div class="mb-3">
									<div class="custom-file">
									  <input type="file" class="custom-file-input @error('photo') is-invalid @enderror" id="photo" name="photo" accept=".png, .jpg, .jpeg" required>
									  @error('photo')
											<div class="invalid-feedback">{{ $message }}</div>
									  @enderror
									  <label class="custom-file-label" for="photo">Choose file</label>
									</div>
								</div>
								<img src="" id="blah" alt="Image">
								<div class="pt-3">
									<button class="btn btn-primary">Add</button>
									<a href="{{ route('restaurants.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
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

@section('script')
	<script>
		function readURL(input) {
		    if (input.files && input.files[0]) {
		      var reader = new FileReader();

		      reader.onload = function(e) {
		        $('#blah').attr('src', e.target.result);
		        $('#blah').show();
		      }

		      reader.readAsDataURL(input.files[0]);
		    }
		  }

		  $("#photo").change(function() {
		      // alert("hi");
		    readURL(this);
		  });
	</script>
@endsection