<div class="sidebar">
    <div class="sidebar__item">
        <h4 class="mb-2">Category</h4>
        <ul>
            @if($categories->isNotEmpty())
                @foreach($categories as $category)
                    <li><a href="{{ route('website.categtory_foods', $category->id) }}">{{ $category->name }}</a></li>
                @endforeach
            @else
                <li>
                    <p class="mb-0">No category found!</p>
                </li>
            @endif
        </ul>
    </div>
    <div class="sidebar__item">
        <h4 class="mb-2">Restaurant</h4>
        <ul>
            @if($restaurants->isNotEmpty())
                @foreach($restaurants as $restaurant)
                    <li><a href="{{ route('website.restaurant_foods', $restaurant->id) }}">{{ $restaurant->name }}</a></li>
                @endforeach
            @else
                <li>
                    <p class="mb-0">No restaurant found!</p>
                </li>
            @endif
        </ul>
    </div>
    <div class="sidebar__item d-none d-lg-block">
        <div class="latest-product__text">
            <h4>Latest Food</h4>
            <div class="latest-product__slider owl-carousel">
                <div class="latest-prdouct__slider__item">
                    @php
                        $i = 1;
                    @endphp
                    @foreach($latests as $latest)
                        <div class="latest-product__item">
                            <div class="latest-product__item__pic">
                                <img src="{{ asset('uploads/foods/' . $latest->photo) }}" alt="Image">
                            </div>
                            <div class="latest-product__item__text">
                                <h6>{{ $latest->name }}</h6>
                                <span>৳{{ $latest->discount_price ? $latest->discount_price : $latest->price; }}</span>
                                <div class="wishlist_cart mt-2">
                                    <li><a href="javascript:void(0)" onclick="addToCart(this, {{ $latest->id }})" class="@if(array_key_exists($latest->id, $carts)) wishlist_cart_active @endif"><i class="fa fa-shopping-cart"></i></a></li>
                                </div>
                            </div>
                        </div>
                @if($i == 3)
                </div>
                <div class="latest-prdouct__slider__item">
                @endif
                    @php
                        $i++;
                    @endphp

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>