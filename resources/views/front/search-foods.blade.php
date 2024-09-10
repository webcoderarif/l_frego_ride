@extends('layout.front')

@section('title', 'Foods - Frego Ride')

@section('style')
<style>
    
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
                <h2 class="text-center mb-3">Search Keyword - {{ $search_keyword }}</h2>
                
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
                        <h2><small>Food</small></h2>
                    </div>
                    <div class="row">
                        @if($search_foods->isNotEmpty())
                            @foreach($search_foods as $search_food)
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="product__item">
                                        <div class="product__item__pic">
                                            <img src="{{ asset('uploads/foods/' . $search_food->photo) }}" alt="Image">
                                            <ul class="product__item__pic__hover">
                                                <li><a href="javascript:void(0)" onclick="addToCart(this, {{ $search_food->id }})" class="@if(array_key_exists($search_food->id, $carts)) wishlist_cart_active @endif"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__item__text">
                                            <h6><a href="#">{{ $search_food->name }}</a></h6>
                                            <h5>৳{{ $search_food->discount_price ? $search_food->discount_price : $search_food->price; }}</h5>
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
                    {{ $search_foods->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->
@endsection

@section('script')
<script>
    
</script>
@endsection