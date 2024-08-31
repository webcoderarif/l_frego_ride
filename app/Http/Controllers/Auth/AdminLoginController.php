<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function index() {
        return view('auth.adminLogin');
    }

    public function authenticate(Request $request) {
        $validate = $request->validate([
            'phone' => 'required|min:11|max:11',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('admin')->attempt(['phone' => $request->phone, 'password' => $request->password])) {
            if (Auth::guard('admin')->user()->role == 'admin') {
                return redirect()->route('admin.dashboard');
            } else {
                Auth::guard('admin')->logout();
                return redirect()->back()->with('status', 'You are not authorized!');
            }
        } else {
            return redirect()->back()->with('status', 'Phone or Password is incorrect!');
        }
    }

    public function logout() {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
