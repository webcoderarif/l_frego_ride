<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Food;

class CartController extends Controller
{
    public function index() {
        return view('front.carts');
    }

    public function add(Request $request) {
        $request->validate([
            'id' => 'numeric'
        ]);

        $food = Food::findOrFail($request->id);
        
        $cart = Session::get('cart', []);
        
        // If the food item already exists in the cart, increase its quantity
        if (isset($cart[$food->id])) {
            $cart[$food->id]['quantity']++;
            $data = 'exist';
        } else {
            $cart[$food->id] = [
                'name' => $food->name,
                'photo' => $food->photo,
                'price' => $food->discount_price ? $food->discount_price : $food->price,
                'quantity' => 1
            ];
            $data = 'added';
        }

        Session::put('cart', $cart);
        
        return response()->json($data);
    }

    public function update(Request $request) {
        $request->validate([
            'id' => 'numeric'
        ]);
        
        $cart = Session::get('cart', []);

        // If the food item already exists in the cart, increase its quantity
        if (isset($cart[$request->id])) {
            if ($request->type == 'plus') {
                $cart[$request->id]['quantity']++;
                $updated = 'updated';
            } else {
                $cart[$request->id]['quantity']--;
                $updated = 'updated';
            }
        }

        Session::put('cart', $cart);

        // get item total price
        $item_total_price = $cart[$request->id]['quantity'] * $cart[$request->id]['price'];

        // get sub total
        $sub_total = 0;
        foreach ($cart as $item) {
            $sub_total += $item['price']*$item['quantity'];
        }

        $data = ['status' => $updated, 'item_total_price' => $item_total_price, 'sub_total' => $sub_total];
        
        return response()->json($data);
    }

    public function delete(Request $request) {
        $request->validate([
            'id' => 'numeric'
        ]);
        $cart = Session::get('cart');;

        if (isset($cart[$request->id])) {
            unset($cart[$request->id]);
            Session::put('cart', $cart);
        }

        $sub_total = 0;
        foreach ($cart as $item) {
            $sub_total += $item['price']*$item['quantity'];
        }

        $deleted = 'deleted';
        $data = ['status' => $deleted, 'sub_total' => $sub_total];
        return response()->json($data);
    }

    public function checkout() {
        return view('front.cart-checkout');
    }
}
