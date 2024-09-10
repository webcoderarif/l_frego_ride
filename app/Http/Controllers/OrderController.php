<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function add_order(Request $request) {
        $id = auth()->id();
        $request->validate([
            'name' => 'required|min:3',
            'address' => 'required|min:5',
            'email' => 'required|email|unique:users,email,'.$id
        ]);

        $carts = Session::get('cart', []);
        $sub_total = 0;
        foreach ($carts as $cart) {
            $sub_total += $cart['price']*$cart['quantity'];
        }
    }
}
