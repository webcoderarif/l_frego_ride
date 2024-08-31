<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function register() {
        return view('auth.register');
    }

    public function store(Request $request) {
        $validate = $request->validate([
            'phone' => 'required|min:11|max:11|unique:users',
            'password' => 'required|min:6'
        ]);

        User::create([
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => 'customer'
        ]);

        return redirect()->back()->with('success', 'Account registered successfully.');
    }

    public function index() {
        return view('auth.login');
    }

    public function authenticate(Request $request) {
        $validate = $request->validate([
            'phone' => 'required|min:11|max:11',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('web')->attempt(['phone' => $request->phone, 'password' => $request->password])) {
            if (Auth::guard('web')->user()->role == 'customer') {
                return redirect()->route('customer.profile');
            } else {
                return redirect()->back()->with('status', 'You are not authorized!');
            }
        } else {
            return redirect()->back()->with('status', 'Phone or Password is incorrect!');
        }
    }

    public function logout() {
        Auth::guard('web')->logout();
        return redirect()->route('customer.login');
    }
}
