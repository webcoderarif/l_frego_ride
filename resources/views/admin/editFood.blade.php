@extends('layout.admin')

@section('title', 'Update Food')

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
					<h1>Edit Food</h1>
				</div>
				<div class="col-6 text-right">
					<a href="{{ route('foods.index') }}" class="btn btn-primary">Back</a>
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
							<form action="{{ route('foods.update', $food->id) }}" method="POST" enctype="multipart/form-data">
								@csrf
								@method('PUT')
								<div class="mb-3">
									<label for="name">Name</label>
									<input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" value="{{ $food->name }}" required>
									@error('name')
										<div class="invalid-feedback">{{ $message }}</div>
									@enderror
								</div>
								<div class="mb-3">
		                            <label for="category">Category</label>
		                            <select name="category" id="category" class="form-control" required>
		                            @if(isset($categories))
		                                <option value="" selected disabled>Choose category</option>
		                                @foreach($categories as $category)
			                                <option @selected($food->category_id == $category->id) value="{{ $category->id }}">{{ $category->name }}</option>
		                                @endforeach
		                            @else
		                            	<option value="" selected disabled>No category found!</option>
		                            @endif
		                            </select>
		                            @error('category')
										<div class="invalid-feedback">{{ $message }}</div>
									@enderror
		                        </div>
								<div class="mb-3">
		                            <label for="restaurant">Restaurant</label>
		                            <select name="restaurant" id="restaurant" class="form-control" required>
		                            @if(isset($restaurants))
		                                <option value="" selected disabled>Choose restaurant</option>
		                                @foreach($restaurants as $restaurant)
			                                <option @selected($food->restaurant_id == $restaurant->id) value="{{ $restaurant->id }}">{{ $restaurant->name }}</option>
		                                @endforeach
		                            @else
		                            	<option value="" selected disabled>No restaurant found!</option>
		                            @endif
		                            </select>
		                            @error('restaurant')
										<div class="invalid-feedback">{{ $message }}</div>
									@enderror
		                        </div>
		                        <div class="form-row">
									<div class="col-6">
										<div class="mb-3">
				                            <label for="price">Price</label>
				                            <input class="form-control" type="number" min="1" name="price" id="price" placeholder="Price" value="{{ $food->price }}" required>
				                            @error('price')
												<div class="invalid-feedback">{{ $message }}</div>
											@enderror
				                        </div>
									</div>
									<div class="col-6">
										<div class="mb-3">
				                            <label for="discount_price">Discount Price</label>
				                            <input class="form-control" type="number" min="1" name="discount_price" id="discount_price" placeholder="Discount Price" value="{{ $food->discount_price }}">
				                        </div>
									</div>
								</div>
								<div class="mb-3">
									<label for="description">Description</label>
									<textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" placeholder="Description">{{ $food->description }}</textarea>
									@error('description')
										<div class="invalid-feedback">{{ $message }}</div>
									@enderror
								</div>
								<div class="form-row">
									<div class="col-6">
										<div class="mb-3">
				                            <label for="popular">Popular</label>
				                            <select name="popular" id="popular" class="form-control">
				                            	<option value="no" @selected($food->is_popular == 'no')>No</option>
				                            	<option value="yes" @selected($food->is_popular == 'yes')>Yes</option>
				                            </select>
				                        </div>
									</div>
									<div class="col-6">
										<div class="mb-3">
				                            <label for="recommend">Recommend</label>
				                            <select name="recommend" id="recommend" class="form-control">
				                            	<option value="no" @selected($food->is_recommend == 'no')>No</option>
				                            	<option value="yes" @selected($food->is_recommend == 'yes')>Yes</option>
				                            </select>
				                        </div>
									</div>
								</div>
								<div class="mb-3">
		                            <label for="status">Status</label>
		                            <select name="status" id="status" class="form-control">
		                            	<option value="0" @selected($food->status == 0)>No</option>
		                            	<option value="1" @selected($food->status == 1)>Yes</option>
		                            </select>
		                        </div>
								<div class="mb-3">
									<input type="hidden" name="old_image" value="{{ $food->photo }}">
									<div class="custom-file">
									  <input type="file" class="custom-file-input @error('photo') is-invalid @enderror" id="photo" name="photo" accept=".png, .jpg, .jpeg">
									  @error('photo')
											<div class="invalid-feedback">{{ $message }}</div>
									  @enderror
									  <label class="custom-file-label" for="photo">Choose file</label>
									</div>
								</div>
								<img src="" id="blah" alt="Image">
								<div class="pt-3">
									<button class="btn btn-primary">Update</button>
									<a href="{{ route('foods.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
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