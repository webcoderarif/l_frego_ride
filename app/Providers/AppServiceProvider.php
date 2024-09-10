<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use App\Models\Wishlist;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFour();

        View::composer('*', function ($view) {
		    // Retrieve the cart from the session
		    $carts = Session::get('cart', []);

            $sub_total = 0;
            foreach ($carts as $cart) {
                $sub_total += $cart['price']*$cart['quantity'];
            }

            $wishlists = Wishlist::where('user_id', auth()->id())->get();

		    // Pass both the cart and total price to the view
		    $view->with([
		        'carts' => $carts,
                'sub_total' => $sub_total,
                'wishlists' => $wishlists
		    ]);
		});
    }
}
