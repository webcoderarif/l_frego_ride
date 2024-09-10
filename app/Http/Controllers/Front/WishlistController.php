<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Wishlist;

class WishlistController extends Controller
{
    public function index() {
        return view('front.wishlists');
    }

    public function add(Request $request) {
        $request->validate([
            'restaurant_id' => 'numeric'
        ]);

        Restaurant::findOrFail($request->restaurant_id);
        $check = Wishlist::where(['restaurant_id' => $request->restaurant_id, 'user_id' => auth()->id()])->get();

        if ($check->isNotEmpty()) {
            $data = 'exist';
        } else {
            Wishlist::create([
                'restaurant_id' => $request->restaurant_id,
                'user_id' => auth()->id()
            ]);
            $data = 'added';
        }

        return response()->json($data);
    }

    public function delete(Request $request) {
        $request->validate([
            'id' => 'numeric'
        ]);

        $item = Wishlist::findOrFail($request->id);
        $item->delete();
        
        $data = 'deleted';
        return response()->json($data);
    }
}
