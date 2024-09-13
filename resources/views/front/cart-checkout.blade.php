@extends('layout.front')

@section('title', 'Checkout')

@section('style')
<style>
    
</style>
@endsection

@section('content')
<!-- Checkout Section Begin -->
<section class="product spad py-5 mt-3">
    <div class="container">
        <div class="checkout__form">
            <h4>Billing Details</h4>
            <form action="{{ route('order.add') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="checkout__input">
                            <p>Fist Name<span>*</span></p>
                            <input type="text" name="name" value="{{ Auth::user()->name }}" {{ Auth::user()->name ? 'readonly' : '' }}>
                        </div>
                        <div class="checkout__input">
                            <p>Address<span>*</span></p>
                            <input type="text" name="address" value="{{ Auth::user()->address ? Auth::user()->address : old('address') }}" placeholder="Street Address" class="checkout__input__add" required>
                        </div>
                        <div class="checkout__input">
                            <p>Email<span>*</span></p>
                            <input type="text" class="@error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="checkout__input">
                            <p>Note</p>
                            <textarea name="note" class="form-control" id="note" placeholder="Write notes here.."></textarea>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4>Your Order</h4>
                            <div class="checkout__order__products">Products <span>Total</span></div>
                            <ul>
                                @php
                                    $sub_total = 0;
                                    $delivery_charge = 50;
                                @endphp

                                @foreach($carts as $cart)
                                <li>{{ $cart['name'] }} x {{ $cart['quantity'] }} <span>৳{{ $cart['quantity'] * $cart['price'] }}</span></li>
                                    @php
                                        $sub_total += $cart['quantity'] * $cart['price']
                                    @endphp
                                @endforeach
                            </ul>
                            <div class="checkout__order__subtotal">Subtotal <span>৳{{ $sub_total }}</span></div>
                            <div class="checkout__order__subtotal">Delivery Charge <span>৳{{ $delivery_charge }}</span></div>
                            <div class="checkout__order__total">Total <span>৳{{ $sub_total + $delivery_charge }}</span></div>
                            <div class="checkout__input__checkbox">
                                <label for="payment">
                                    Cash On Delivery
                                    <input type="radio" name="payment_method" id="payment" value="cash" required>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            {{-- <div class="checkout__input__checkbox">
                                <label for="paypal">
                                    Online Payment
                                    <input type="radio" name="payment_method" id="paypal" value="online" required>
                                    <span class="checkmark"></span>
                                </label>
                            </div> --}}
                            <button type="submit" class="site-btn">PLACE ORDER</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Checkout Section End -->
@endsection

@section('script')
<script>
    
</script>
@endsection