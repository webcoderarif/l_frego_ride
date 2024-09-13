<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;

class OrderController extends Controller
{
    public function index() {
        $orders = Order::where('user_id', auth()->id())->paginate(2);
        return view('front.orders', compact('orders'));
    }
    public function add_order(Request $request) {
        $id = auth()->id();
        $request->validate([
            'name' => 'required|min:3',
            'address' => 'required|min:5',
            'email' => 'required|email|unique:users,email,'.$id
        ]);

        $carts = Session::get('cart', []);
        $sub_total = 0;

        foreach ($carts as $item) {
            $sub_total += $item['price'] * $item['quantity']; // Calculate total for each item
        }

        $delivery_charge = 50;

        $order = Order::create([
            'user_id' => $id,
            'sub_total' => $sub_total,
            'delivery_charge' => $delivery_charge,
            'total_price' => $sub_total + $delivery_charge,
            'note' => $request->note,
            'payment_method' => $request->payment_method
        ]);

        foreach ($carts as $key => $cart) {
            OrderItem::create([
                'order_id' => $order->id,
                'food_id' => $key,
                'name' => $cart['name'],
                'photo' => $cart['photo'],
                'quantity' => $cart['quantity'],
                'price' => $cart['price'],
                'item_total_price' => $cart['price'] * $cart['quantity'],
            ]);
        }

        User::findOrFail($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address
        ]);

        // Clear the cart after placing the order
        session()->forget('cart');

        return redirect()->route('order.index')->with('status', 'Order added successfully.');
    }

    // for admin section
    public function pendingOrders() {
        $orders = Order::where('status', 'pending')->paginate(1);
        $status = 'pending';
        return view('admin.orders', compact('orders', 'status'));
    }

    public function acceptedOrders() {
        $orders = Order::where('status', 'accepted')->paginate(1);
        $status = 'accepted';
        return view('admin.orders', compact('orders', 'status'));
    }

    public function completedOrders() {
        $orders = Order::where('status', 'completed')->paginate(1);
        $status = 'completed';
        return view('admin.orders', compact('orders', 'status'));
    }

    public function cancelledOrders() {
        $orders = Order::where('status', 'cancelled')->paginate(1);
        $status = 'cancelled';
        return view('admin.orders', compact('orders', 'status'));
    }

    // order status change
    public function orderStatus(Request $request) {
        $request->validate([
            'id' => 'required',
            'status' => 'required'
        ]);
        Order::findOrFail($request->id)->update([
            'status' => $request->status
        ]);

        OrderItem::where('order_id', $request->id)->update([
            'status' => $request->status
        ]);

        return response()->json('updated');
    }

    public function viewOrder($id) {
        $order = Order::findOrFail($id);
        return view('admin.showOrder', compact('order'));
    }
}
