@extends('layout.front')

@section('title', 'Foods - Frego Ride')

@section('style')
<style>
    .wishlist_button {
        font-size: 16px;
        color: #1c1c1c;
        height: 40px;
        width: 40px;
        line-height: 40px;
        text-align: center;
        border: 1px solid #ebebeb;
        background: #ffffff;
        display: block;
        border-radius: 50%;
        -webkit-transition: all, 0.5s;
        -moz-transition: all, 0.5s;
        -ms-transition: all, 0.5s;
        -o-transition: all, 0.5s;
        transition: all, 0.5s;
    }
    .wishlist_button:hover {
        background: #7fad39!important;
        border-color: #7fad39!important;
    }
</style>
@endsection

@section('content')
<!-- Product Section Begin -->
<section class="product spad py-5 mt-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 d-none d-lg-block">
                @include('includes.sidebar')
            </div>
            <div class="col-lg-9 col-md-7">
            	@include('includes.search')
                <br>
                <div class="row mb-4">
                    <div class="col-sm-6">
                        <img src="{{ asset('uploads/restaurants/' . $restaurant->photo) }}" width="100%" height="200px" alt="Image">
                    </div>
                    <div class="col-sm-6">
                        <h2 class="mb-3">{{ $restaurant->name }}</h2>
                        <p><i class="fa fa-home" style="font-size: 25px;"></i> {{ $restaurant->address }}</p>

                        <div class="d-flex align-items-center">
                            <a href="javascript:void(0)" onclick="addToWishlist(this, {{ $restaurant->id }})" class="mr-2 wishlist_button @if (collect($wishlists)->contains('restaurant_id', $restaurant->id)) wishlist_cart_active @endif"><i class="fa fa-shopping-cart"></i></a>Add to favourites
                        </div>
                    </div>
                </div>
                <div class="product__discount pb-0">
                    <div class="section-title product__discount__title mb-5">
                        <h2><small>Recommended</small></h2>
                    </div>
                    <div class="row">
                    	@if($recommends->isNotEmpty())
	                        @foreach($recommends as $recommend)
	                        	<div class="col-lg-3 col-md-6 col-sm-6">
			                        <div class="product__item">
			                            <div class="product__item__pic">
			                            	<img src="{{ asset('uploads/foods/' . $recommend->photo) }}" alt="Image">
			                                <ul class="product__item__pic__hover">
			                                    <li><a href="javascript:void(0)" onclick="addToCart(this, {{ $recommend->id }})" class="@if(array_key_exists($recommend->id, $carts)) wishlist_cart_active @endif"><i class="fa fa-shopping-cart"></i></a></li>
			                                </ul>
			                            </div>
			                            <div class="product__item__text">
			                                <h6><a href="#">{{ $recommend->name }}</a></h6>
			                                <h5>৳{{ $recommend->discount_price ? $recommend->discount_price : $recommend->price; }}</h5>
			                            </div>
			                        </div>
			                    </div>
	                        @endforeach
	                    @else
	                    	<div class="col-12 text-center">No recommendation found!</div>
	                    @endif
                    </div>
                </div>
                <div class="product__discount pb-0">
                    <div class="section-title product__discount__title mb-5">
                        <h2><small>Popular</small></h2>
                    </div>
                    <div class="row">
                    	@if($populars->isNotEmpty())
	                        @foreach($populars as $popular)
	                        	<div class="col-lg-3 col-md-6 col-sm-6">
			                        <div class="product__item">
			                            <div class="product__item__pic">
			                            	<img src="{{ asset('uploads/foods/' . $popular->photo) }}" alt="Image">
			                                <ul class="product__item__pic__hover">
			                                    <li><a href="javascript:void(0)" onclick="addToCart(this, {{ $popular->id }})" class="@if(array_key_exists($popular->id, $carts)) wishlist_cart_active @endif"><i class="fa fa-shopping-cart"></i></a></li>
			                                </ul>
			                            </div>
			                            <div class="product__item__text">
			                                <h6><a href="#">{{ $popular->name }}</a></h6>
			                                <h5>৳{{ $popular->discount_price ? $popular->discount_price : $popular->price; }}</h5>
			                            </div>
			                        </div>
			                    </div>
	                        @endforeach
	                    @else
	                    	<div class="col-12 text-center">No popular found!</div>
	                    @endif
                    </div>
                </div>
                <hr>
                <div class="filter__item d-none">
                    <div class="row">
                        <div class="col-lg-4 col-md-5">
                            <div class="filter__sort">
                                <span>Sort By</span>
                                <select>
                                    <option value="0">Default</option>
                                    <option value="0">Default</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="filter__found">
                                <h6><span>16</span> Products found</h6>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-3">
                            <div class="filter__option">
                                <span class="icon_grid-2x2"></span>
                                <span class="icon_ul"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product__discount pb-0">
                    <div class="section-title product__discount__title mb-5">
                        <h2><small>More Food</small></h2>
                    </div>
                    <div class="row">
                        @if($foods->isNotEmpty())
                            @foreach($foods as $food)
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="product__item">
                                        <div class="product__item__pic">
                                            <img src="{{ asset('uploads/foods/' . $food->photo) }}" alt="Image">
                                            <ul class="product__item__pic__hover">
                                                <li><a href="javascript:void(0)" onclick="addToCart(this, {{ $food->id }})" class="@if(array_key_exists($food->id, $carts)) wishlist_cart_active @endif"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__item__text">
                                            <h6><a href="#">{{ $food->name }}</a></h6>
                                            <h5>৳{{ $food->discount_price ? $food->discount_price : $food->price; }}</h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-12 text-center">No food found!</div>
                        @endif
                    </div>
                </div>
                <div class="float-right">
                    {{ $foods->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->
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
    // add to wishlist
    function addToWishlist(element, id) {
        $.ajax({
            url: '{{ route("wishlist.add") }}',
            type: 'post',
            data: {'restaurant_id': id},
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

                if(data == 'exist') {
                    Toast.fire({
                      icon: 'success',
                      title: 'Already added to favourites.'
                    })
                } else {
                    $('.total_wishlist').text(parseInt($('.total_wishlist').text()) + 1);
                    $(element).addClass('wishlist_cart_active');
                    Toast.fire({
                      icon: 'success',
                      title: 'Added to favourites.'
                    })
                }
                
                // alert message end
            }
        });
    }
</script>
@endsection