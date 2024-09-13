@extends('layout.front')

@section('title', 'Profile')

@section('style')
<style>
    
</style>
@endsection

@section('content')
<div class="container py-5">
	<div class="row">
		<div class="col-sm-6 offset-sm-3">
			@if(Session::has('status'))
				<div class="alert alert-success">{{ Session::get('status') }}</div>
			@endif
			<h3 class="mb-3">My Profile</h3>
			<form action="{{ route('customer.update') }}" method="POST">
			  @csrf
			  <div class="form-group">
			    <label for="name">Name</label>
			    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ Auth::user()->name }}" placeholder="Enter name">
			    @error('name')
			    	<div class="invalid-feedback">{{ $message }}</div>
			    @enderror
			  </div>
			  <div class="form-group">
			    <label for="phone">Phone</label>
			    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" pattern="01[0-9]{9}" value="{{ Auth::user()->phone }}" placeholder="Enter phone">
			    @error('phone')
			    	<div class="invalid-feedback">{{ $message }}</div>
			    @enderror
			  </div>
			  <div class="form-group">
			    <label for="email">Email</label>
			    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ Auth::user()->email }}" placeholder="Enter email">
			    @error('email')
			    	<div class="invalid-feedback">{{ $message }}</div>
			    @enderror
			  </div>
			  <button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
		<div class="col-sm-6 offset-sm-3 mt-5">
			<h3 class="mb-3">Change Password</h3>
			<form action="{{ route('customer.change-password') }}" method="POST">
			  @csrf
			  <div class="form-group">
			    <label for="current_password">Current Password</label>
			    <input type="password" class="form-control @error('current_password') is-invalid @enderror" id="current_password" name="current_password" placeholder="Enter current password">
			    @error('current_password')
			    	<div class="invalid-feedback">{{ $message }}</div>
			    @enderror
			  </div>
			  <div class="form-group">
			    <label for="new_password">New Password</label>
			    <input type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" id="new_password" placeholder="Enter new password">
			    @error('new_password')
			    	<div class="invalid-feedback">{{ $message }}</div>
			    @enderror
			  </div>
			  <button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
</div>
@endsection

@section('script')
<script>
    
</script>
@endsection