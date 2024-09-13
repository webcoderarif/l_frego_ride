<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('front_assets/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('front_assets/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('front_assets/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('front_assets/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('front_assets/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('front_assets/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('front_assets/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('front_assets/css/style.css') }}" type="text/css">
    <style>
        .header {
            position: fixed;
            top: 0;
            z-index: 9;
            width: 100%;
            background: white;
            box-shadow: 0px 0px 24px 0px rgba(0, 0, 0, 0.16);
        }

        .wishlist_cart li {
            list-style: none;
            display: inline-block;
            margin-right: 6px;
        }
        .wishlist_cart li a {
            font-size: 16px;
            color: #1c1c1c;
            height: 30px;
            width: 30px;
            line-height: 30px;
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
        .wishlist_cart li:hover a {
            background: #7fad39;
            border-color: #7fad39;
        }
        .wishlist_cart li:hover a i {
            color: white;
        }

        .wishlist_cart_active {
            background: #7fad39!important;
            border-color: #7fad39!important;
        }
        .wishlist_cart_active i {
            color: white;
        }
    </style>    
    @yield('style')
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo text-center">
            <a href="{{ route('website.index') }}"><img src="{{ asset('uploads/logo.png') }}" alt="" style="height: 70px;"></a>
        </div>
        <div class="humberger__menu__cart d-none">
            <ul>
                <li><a href="{{ route('wishlist.index') }}"><i class="fa fa-heart"></i> <span class="total_wishlist">{{ count($wishlists) }}</span></a></li>
                <li><a href="{{ route('cart.index') }}"><i class="fa fa-shopping-bag"></i> <span class="total_cart">{{ count($carts) }}</span></a></li>
            </ul>
            <div class="header__cart__price">item: <span></span></div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                @auth
                    <li><a href="{{ route('customer.profile') }}">Profile</a></li>
                    <li><a href="{{ route('order.index') }}">Order</a></li>
                @endauth
                <li><a href="{{ route('website.contact') }}">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
    </div>
    <!-- Humberger End -->

    @if(Request::routeIs(['website.foods', 'website.categtory_foods', 'website.restaurant_foods', 'website.search_foods']))
        <div class="filter_menu">
            @include('includes.sidebar')
        </div>
    @endif

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="{{ route('website.index') }}"><img src="{{ asset('uploads/logo.png') }}" alt="" style="height: 50px;"></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul class="float-right">
                            @auth
                                <li><a href="{{ route('customer.profile') }}">Profile</a></li>
                                <li><a href="{{ route('order.index') }}">Order</a></li>
                            @endauth
                            <li><a href="{{ route('website.contact') }}">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="{{ route('wishlist.index') }}"><i class="fa fa-heart"></i> <span class="total_wishlist">{{ count($wishlists) }}</span></a></li>
                            <li><a href="{{ route('cart.index') }}"><i class="fa fa-shopping-bag"></i> <span id="total_cart">{{ count($carts) }}</span></a></li>
                            @auth
                            <li>
                                <a href="{{ route('account.logout') }}" class="text-dark ml-2">
                                    <svg aria-hidden="true" focusable="false" class="fl-interaction-secondary" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M6 3.75C4.53747 3.75 3.3416 4.8917 3.25502 6.33248L3.25 6.5V17.5C3.25 18.9625 4.3917 20.1584 5.83248 20.245L6 20.25H12C13.4625 20.25 14.6584 19.1083 14.745 17.6675L14.75 17.5V16.9969C14.75 16.5827 14.4142 16.2469 14 16.2469C13.6203 16.2469 13.3065 16.5291 13.2568 16.8952L13.25 16.9969V17.5C13.25 18.1472 12.7581 18.6795 12.1278 18.7435L12 18.75H6C5.35279 18.75 4.82047 18.2581 4.75645 17.6278L4.75 17.5V6.5C4.75 5.85279 5.24187 5.32047 5.87219 5.25645L6 5.25H12C12.6472 5.25 13.1795 5.74187 13.2435 6.37219L13.25 6.5V9.06042C13.25 9.47463 13.5858 9.81042 14 9.81042C14.3797 9.81042 14.6935 9.52827 14.7432 9.16219L14.75 9.06042V6.5C14.75 5.03747 13.6083 3.8416 12.1675 3.75502L12 3.75H6ZM17.3234 9.39702L17.4075 9.46963L20.6328 12.6944C20.7884 12.85 20.7892 13.1019 20.6345 13.2584L20.4805 13.4143C20.4261 13.4963 20.3561 13.5669 20.2746 13.6219L17.3876 16.5284C17.0958 16.8223 16.6209 16.8241 16.3269 16.5323C16.0597 16.267 16.0339 15.8505 16.2507 15.556L16.323 15.4716L17.8622 13.9204C17.9011 13.8812 17.9008 13.8179 17.8616 13.779C17.8429 13.7604 17.8176 13.75 17.7912 13.75H8.85527C8.44105 13.75 8.10527 13.4142 8.10527 13C8.10527 12.6203 8.38742 12.3065 8.7535 12.2568L8.85527 12.25H17.8258C17.881 12.25 17.9258 12.2052 17.9258 12.15C17.9258 12.1235 17.9152 12.098 17.8965 12.0793L16.3469 10.5304C16.0806 10.2641 16.0564 9.84747 16.2742 9.55384L16.3468 9.46971C16.6131 9.20342 17.0297 9.17919 17.3234 9.39702Z"></path></svg>Logout
                                </a>
                            </li>
                            @endauth

                            @guest
                                <li><a href="{{ route('customer.register') }}" class="ml-2 text-dark">Register</a></li>
                                <li><a href="{{ route('customer.login') }}" class="text-dark">Login</a></li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->
    <div style="height: 80px;"></div>


    @yield('content')


    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="{{ route('website.index') }}">
                                <img src="{{ asset('uploads/logo.png') }}" alt="" style="height: 70px;">
                            </a>
                        </div>
                        <ul class="ml-0">
                            <li>Address: 60-49 Road 11378 New York</li>
                            <li>Phone: +65 11.188.888</li>
                            <li>Email: hello@colorlib.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Useful Links</h6>
                        <ul class="ml-0">
                            <li><a href="{{ route('website.contact') }}">Contact</a></li>
                            <li><a href="{{ route('website.terms&condition') }}">Terms and Conditions</a></li>
                            <li><a href="{{ route('website.privacy-policy') }}">Privacy Policy</a></li>
                            <li><a href="{{ route('website.return-policy') }}">Return Policy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Join Our Newsletter Now</h6>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#">
                            <input type="text" placeholder="Enter your mail">
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid bg-white">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright mt-0">
                        <p class="text-center mb-0">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved.</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="{{ asset('front_assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('front_assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('front_assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('front_assets/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('front_assets/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('front_assets/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('front_assets/js/owl.carousel.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('front_assets/js/main.js') }}"></script>

    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
        // add to cart
        function addToCart(element, id) {
            $.ajax({
                url: '{{ route("cart.add") }}',
                type: 'post',
                data: {'id': id},
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

                    if(data != 'exist') {
                        $('#total_cart').text(parseInt($('#total_cart').text()) + 1);
                    }

                    $(element).addClass('wishlist_cart_active');
                    Toast.fire({
                      icon: 'success',
                      title: 'Added to cart.'
                    })
                    // alert message end
                }
            });
        }
        // update cart
        function updateCart(type, id) {
            var qty = $('#id_qty' + id).val();
            if (qty == 1 && type == 'minus') {

            } else {
                $.ajax({
                    url: '{{ route("cart.update") }}',
                    type: 'post',
                    data: {'id': id, 'type': type},
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

                        if(data['status'] == 'updated') {
                            if (type == 'plus') {
                                $('#id_qty' + id).val(parseInt(qty)+1);
                            } else {
                                $('#id_qty' + id).val(parseInt(qty)-1);
                            }
                            $('#price_key_' + id).text(data['item_total_price']);

                            $('#sub_total').text(data['sub_total']);
                            $('#total').text(parseInt(data['sub_total']) + parseInt($('#delivery_cost').text()));
                            Toast.fire({
                              icon: 'success',
                              title: 'Cart updated.'
                            })
                        }
                        // alert message end
                    }
                });
            }
        }
        // remove from cart
        function removeFromCart(element, id) {
            $.ajax({
                url: '{{ route("cart.delete") }}',
                type: 'post',
                data: {'id': id},
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

                    if(data['status'] == 'deleted') {
                        $('#id_' + id).remove();
                        $('#total_cart').text(parseInt($('#total_cart').text()) - 1);

                        $('#sub_total').text(data['sub_total']);
                        $('#total').text(parseInt(data['sub_total']) + parseInt($('#delivery_cost').text()));

                        Toast.fire({
                          icon: 'success',
                          title: 'Deleted from cart.'
                        })
                    }
                    // alert message end
                }
            });
        }
    </script>
    @yield('script')
</body>

</html>