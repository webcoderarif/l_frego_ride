@extends('layout.admin')

@section('title', 'Show Order')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">                    
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-6">
                    <h1>Show Order</h1>
                </div>
                <div class="col-6 text-right">
                    <a href="javascript:void(0)" onclick="history.back()" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container-fluid">
            <div class="d-flex justify-content-between mb-3 border-top border-bottom">
                <span>Payment Method: {{ ucfirst($order->payment_method) }}</span>
                <span>Total Price: ৳{{ $order->total_price }}</span>
                <span>Status: {{ ucfirst($order->status) }}</span>
            </div>
            <div class="row">
                @foreach($order->order_items as $order_item)
                    <div class="col-sm-6 col-md-4 col-lg-3 d-flex mb-2">
                        <img class="border" src="{{ asset('uploads/foods/' . $order_item->photo) }}" alt="Image" style="height: 80px;">
                        <div class="ml-3">
                            <h5 class="mb-1">{{ $order_item->name }}</h5>
                            <p class="mb-1">QTY - {{ $order_item->quantity }}</p>
                            <p class="mb-1">৳ {{ $order_item->quantity * $order_item->price }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <p class="mb-2"><i>Note:</i> {{ $order['note'] }}</p>
            @if($order->status == 'pending')
                <a href="javascript:void(0)" onclick="updateStatus('accepted', {{ $order->id }})" class="btn btn-primary btn-sm">Accept</a>
                <a href="javascript:void(0)" onclick="updateStatus('cancelled', {{ $order->id }})" class="btn btn-dark btn-sm">Cancel</a>
            @elseif($order->status == 'accepted')
                <a href="javascript:void(0)" onclick="updateStatus('completed', {{ $order->id }})" class="btn btn-success btn-sm">Complete</a>
                <a href="javascript:void(0)" onclick="updateStatus('cancelled', {{ $order->id }})" class="btn btn-dark btn-sm">Cancel</a>
            @endif
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

                    Toast.fire({
                      icon: 'success',
                      title: 'Order ' + status + ' successfully.'
                    })
                    // alert message end

                    // Wait for 2 seconds (2000 milliseconds) before redirecting
                    setTimeout(function() {
                        window.location = `{{ route('admin.order.view', '') }}/${id}`;
                    }, 2000);  // 2000 milliseconds = 2 seconds
                }
            });
        }
    }
</script>
@endsection