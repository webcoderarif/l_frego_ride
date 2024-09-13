@extends('layout.front')

@section('title', 'Carts')

@section('style')
<style>
    
</style>
@endsection

@section('content')
<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Food Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($carts) > 0)
                                @foreach($carts as $key => $cart)
                                <tr id="id_{{ $key }}">
                                    <td class="shoping__cart__item">
                                        <img src="{{ asset('uploads/foods/' . $cart['photo']) }}" alt="Image" height="60px">
                                        <h5>{{ $cart['name'] }}</h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        ৳{{ $cart['price'] }}
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <span class="dec" onclick="updateCart('minus', {{ $key }})" style="cursor: pointer;">-</span>
                                                <input id="id_qty{{ $key }}" type="text" value="{{ $cart['quantity'] }}" readonly="">
                                                <span class="inc" onclick="updateCart('plus', {{ $key }})" style="cursor: pointer;">+</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                        ৳<span id="price_key_{{ $key }}">{{ $cart['price'] * $cart['quantity'] }}</span>
                                    </td>
                                    <td onclick="removeFromCart(this, {{ $key }})" class="shoping__cart__item__close">
                                        <span class="icon_close"></span>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                            <tr>
                                <td colspan="5" class="text-center">Cart is empty!</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns float-right">
                    <a href="{{ route('website.foods') }}" class="primary-btn cart-btn">Add More</a>
                </div>
            </div>
            <div class="col-lg-6">
                {{-- <div class="shoping__continue">
                    <div class="shoping__discount">
                        <h5>Discount Codes</h5>
                        <form action="#">
                            <input type="text" placeholder="Enter your coupon code">
                            <button type="submit" class="site-btn">APPLY COUPON</button>
                        </form>
                    </div>
                </div> --}}
            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Cart Total</h5>
                    <ul>
                        <li>Subtotal <span class="text-right">৳<span id="sub_total">{{ $sub_total }}</span></span></li>
                        <li>Delivery Cost <span class="text-right">৳<span id="delivery_cost">50</span></span></li>
                        <li>Total <span class="text-right">৳<span id="total">{{ $sub_total + 50 }}</span></span></li>
                    </ul>
                    <a href="{{ route('cart.checkout') }}" class="primary-btn">PROCEED TO CHECKOUT</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shoping Cart Section End -->
@endsection

@section('script')
<script>
    
</script>
@endsection