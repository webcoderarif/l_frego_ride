@extends('layout.front')

@section('title', 'Favourites')

@section('style')
<style>
    .wishlist_title:hover {
        color: black;
    }
</style>
@endsection

@section('content')
<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
        <h4 class="mb-3">My Favourites</h4>
        <div class="row">
            @if(count($wishlists) > 0)
                @foreach($wishlists as $wishlist)
                    <div class="col-sm-3" id="id_{{ $wishlist->id }}">
                        <div class="card">
                            <div class="card-body">
                                <a href="{{ route('website.restaurant_foods', $wishlist->id) }}">
                                    <img src="{{ asset('uploads/restaurants/' . $wishlist->restaurant->photo) }}" alt="Image" width="" ="100px">
                                </a>
                                <h5 class="my-3">
                                    <a class="wishlist_title" href="{{ route('website.restaurant_foods', $wishlist->id) }}">{{ $wishlist->restaurant->name }}</a>
                                </h5>
                                <buton type="button" class="btn btn-outline-danger btn-sm mb-0" onclick="removeFromWishlist(this, {{ $wishlist->id }})">
                                    Remove
                                </buton>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12">Favourites list is empty!</div>
            @endif
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns float-right">
                    <a href="{{ route('website.foods') }}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shoping Cart Section End -->
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
    // delete from wishlist
    function removeFromWishlist(element, id) {
        if (confirm('Are you sure to remove?')) {
            $.ajax({
                url: '{{ route("wishlist.delete") }}',
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

                    if(data == 'deleted') {
                        $('.total_wishlist').text(parseInt($('.total_wishlist').text()) - 1);
                        $('#id_' + id).remove();
                        Toast.fire({
                          icon: 'success',
                          title: 'Deleted from favourites.'
                        })
                    }
                    
                    // alert message end
                }
            });
        }
    }
</script>
@endsection