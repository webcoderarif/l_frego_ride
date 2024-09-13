<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ProfileController extends Controller
{
    public function index() {
        return view('front.profile');
    }

    public function update(Request $request) {
        $id = auth()->id();
        $request->validate([
            'name' => 'required|min:3',
            'phone' => 'required|unique:users,phone,'.$id,
            'email' => 'required|unique:users,email,'.$id
        ]);
        User::findOrFail($id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email
        ]);

        return redirect()->back()->with('status', 'Profile updated successfully.');
    }

    public function changePassword(Request $request) {
        $id = auth()->id();
        $request->validate([
            'current_password' => 'required|min:6',
            'new_password' => 'required|min:6'
        ]);

        $user = User::findOrFail($id);

        if (Hash::check($request->current_password, $user->password)) {
            $user->update([
                'password' => Hash::make($request->new_password)
            ]);
        } else {
            return redirect()->back()->with('status', 'Current password does not match!');
        }
        return redirect()->back()->with('status', 'Password changed successfully.');
    }
}
