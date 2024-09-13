@extends('layout.admin')

@section('title', 'Users')

@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">					
		<div class="container-fluid my-2">
			<div class="row mb-2">
				<div class="col-6">
					<h1>Users</h1>
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
				<div class="card-body table-responsive p-0">							@if(Session::has('success'))
						<div class="alert alert-success">{{ Session::get('success') }}</div>
					@endif
					<table class="table table-hover text-nowrap">
						<thead>
							<tr>
								<th>ID</th>
								<th>Name</th>
								<th>Email</th>
								<th>Phone</th>
								<th>Address</th>
							</tr>
						</thead>
						<tbody>
							@if($users->isNotEmpty())
								@php
									$serial = 1;
								@endphp

								@foreach($users as $user)
									<tr>
										<td>{{ $serial++; }}</td>
										<td>{{ $user->name }}</td>
										<td>{{ $user->email }}</td>
										<td>{{ $user->phone }}</td>
										<td>{{ $user->address }}</td>
									</tr>
								@endforeach
							@else
								<tr>
									<td colspan="3" class="text-center">No users found!</td>
								</tr>
							@endif
						</tbody>
					</table>										
				</div>
				<div class="card-footer clearfix">
					<div class="float-right">{{ $users->links() }}</div>
				</div>
			</div>
		</div>
		<!-- /.card -->
	</section>
	<!-- /.content -->
</div>
@endsection