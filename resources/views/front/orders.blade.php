@extends('layout.front')

@section('title', 'Orders')

@section('style')
<style>
    
</style>
@endsection

@section('content')
<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
        <h4 class="mb-3">My Orders</h4>
        <div class="row">
        @if(count($orders) > 0)
            @foreach($orders as $order)
            <div class="col-lg-12">
                <div class="row">
                @foreach($order->order_items as $order_item)
                    <div class="col-sm-6 col-md-4 col-lg-3 d-flex mb-2">
                        <img src="{{ asset('uploads/foods/' . $order_item->photo) }}" alt="Image" style="height: 80px;">
                        <div class="ml-3">
                            <h5 class="mb-1">{{ $order_item->name }}</h5>
                            <p class="mb-1">QTY - {{ $order_item->quantity }}</p>
                            <p class="mb-1">৳ {{ $order_item->quantity * $order_item->price }}</p>
                        </div>
                    </div>
                @endforeach
                </div>
                <p class="mb-2"><i>Note:</i> {{ $order['note'] }}</p>
                <div class="d-flex justify-content-between mb-3 border-top border-bottom">
                    <span>{{ ucfirst($order->payment_method) }}</span>
                    <span>৳{{ $order->total_price }}</span>
                    <span>{{ ucfirst($order->status) }}</span>
                </div>
            </div>
            @endforeach
        @else
            <div class="col-12">
                <p class="text-center">Order is empty!</p>
            </div>
        @endif
        </div>
    </div>
</section>
<!-- Shoping Cart Section End -->
@endsection

@section('script')
<script>
    
</script>
@endsection