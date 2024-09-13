@extends('layout.admin')

@section('title', 'Orders')

@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">					
		<div class="container-fluid my-2">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>{{ ucfirst($status) }} Orders</h1>
				</div>
				<div class="col-sm-6 text-sm-right">
					<a href="{{ route('admin.orders.pending') }}" class="btn btn-warning btn-sm {{ $status == 'pending' ? 'd-none' : '' }}">Pending</a>
					<a href="{{ route('admin.orders.accepted') }}" class="btn btn-primary btn-sm {{ $status == 'accepted' ? 'd-none' : '' }}">Accepted</a>
					<a href="{{ route('admin.orders.completed') }}" class="btn btn-success btn-sm {{ $status == 'completed' ? 'd-none' : '' }}">Completed</a>
					<a href="{{ route('admin.orders.cancelled') }}" class="btn btn-dark btn-sm {{ $status == 'cancelled' ? 'd-none' : '' }}">Cancelled</a>
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
								<th>Order ID</th>
								<th>Customer</th>
								<th>Email</th>
								<th>Phone</th>
								<th>Status</th>
								<th>Total</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@if($orders->isNotEmpty())

								@foreach($orders as $order)
									<tr id="id_{{ $order->id }}">
										<td>
											<a href="{{ route('admin.order.view', $order->id) }}">ORDER{{ $order->id }}</a>
										</td>
										<td>{{ $order->user->name }}</td>
										<td>{{ $order->user->email }}</td>
										<td>{{ $order->user->phone }}</td>
										<td>{{ ucfirst($order->status) }}</td>
										<td>৳{{ $order->sub_total }}</td>
										<td>
											@if($status == 'pending')
												<a href="javascript:void(0)" onclick="updateStatus('accepted', {{ $order->id }})" class="btn btn-primary btn-sm">Accept</a>
												<a href="javascript:void(0)" onclick="updateStatus('cancelled', {{ $order->id }})" class="btn btn-dark btn-sm">Cancel</a>
											@elseif($status == 'accepted')
												<a href="javascript:void(0)" onclick="updateStatus('completed', {{ $order->id }})" class="btn btn-success btn-sm">Complete</a>
												<a href="javascript:void(0)" onclick="updateStatus('cancelled', {{ $order->id }})" class="btn btn-dark btn-sm">Cancel</a>
											@else
												N/A
											@endif
										</td>
										<td></td>
									</tr>
								@endforeach
							@else
								<tr>
									<td colspan="7" class="text-center">No {{ $status }} orders found!</td>
								</tr>
							@endif
						</tbody>
					</table>										
				</div>
				<div class="card-footer clearfix">
					<div class="float-right">{{ $orders->links() }}</div>
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
	$(document).ready(function(){
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });
	// update status
    function updateStatus(status, id) {
    	if (confirm('Are you sure to ' + status + '?')) {
	        $.ajax({
	            url: '{{ route("admin.orders.status") }}',
	            type: 'post',
	            data: {'id': id, 'status': status},
	            success:function(data) {

	                // alert message start
	                const Toast = Swal.mixin({
	                  toast: true,
	                  position: 'top-end',
	                  showConfirmButton: false,
	                  timer: 3000,
	                  timerProgressBar: true,
	                  didOpen: (toast) => {
	                    toast.addEventListener('mouseenter', Swal.stopTimer)
	                    toast.addEventListener('mouseleave', Swal.resumeTimer)
	                  }
	                })

	                $('#id_' + id).remove();

	                Toast.fire({
	                  icon: 'success',
	                  title: 'Order ' + status + ' successfully.'
	                })
	                // alert message end
	            }
	        });
	    }
    }
</script>
@endsection