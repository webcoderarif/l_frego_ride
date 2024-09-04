<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use Illuminate\Support\Facades\File;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $restaurants = Restaurant::orderBy('id', 'DESC')->paginate(2);
        return view('admin.restaurants', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.createRestaurant');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|unique:restaurants|min:3',
            'photo' => 'image',
            'address' => 'required|min:5'
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileName = time() . '.' . $file->extension();

            $file->move(public_path('uploads/restaurants'), $fileName);

            Restaurant::create([
                'name' => $request->name,
                'photo' => $fileName,
                'address' => $request->address
            ]);
        } else {
            Restaurant::create([
                'name' => $request->name,
                'address' => $request->address
            ]);
        }

        return redirect()->back()->with('status', 'Restaurant added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $restaurant = Restaurant::findOrFail($id);
        return view('admin.editRestaurant', compact('restaurant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'name' => 'required|min:3|unique:restaurants,name,' . $id,
            'photo' => 'image',
            'address' => 'required|min:5'
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileName = time() . '.' . $file->extension();

            $file->move(public_path('uploads/restaurants'), $fileName);

            if ($request->old_image != '') {
                File::delete(public_path() . '/uploads/restaurants/' . $request->old_image);
            }

            Restaurant::findOrFail($id)->update([
                'name' => $request->name,
                'photo' => $fileName,
                'address' => $request->address
            ]);
        } else {
            Restaurant::findOrFail($id)->update([
                'name' => $request->name,
                'address' => $request->address
            ]);
        }

        return redirect()->back()->with('status', 'Restaurant updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $restaurant = Restaurant::findOrFail($id);
        File::delete(public_path() . '/uploads/restaurants/' . $restaurant->photo);
        $restaurant->delete();
        return redirect()->back()->with('status', 'Restaurant deleted successfully.');
    }
}
