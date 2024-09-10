<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Restaurant;
use App\Models\Food;
use Illuminate\Support\Facades\File;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $foods = Food::orderBy('id', 'DESC')->paginate(5);
        return view('admin.foods', compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('id', 'DESC')->get();
        $restaurants = Restaurant::orderBy('id', 'DESC')->get();
        return view('admin.createFood', compact('categories', 'restaurants'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|min:3',
            'category' => 'required',
            'restaurant' => 'required',
            'price' => 'required|numeric',
            'photo' => 'required|image'
        ]);

        $file = $request->file('photo');
        $fileName = time() . '.' . $file->extension();

        $file->move(public_path('uploads/foods'), $fileName);

        Food::create([
            'name' => $request->name,
            'category_id' => $request->category,
            'restaurant_id' => $request->restaurant,
            'price' => $request->price,
            'discount_price' => $request->discount_price,
            'description' => $request->description,
            'is_popular' => $request->popular,
            'is_recommend' => $request->recommend,
            'photo' => $fileName
        ]);

        return redirect()->back()->with('status', 'Food added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $food = Food::findOrFail($id);
        return view('admin.showFood', compact('food'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $food = Food::findOrFail($id);
        $categories = Category::orderBy('id', 'DESC')->get();
        $restaurants = Restaurant::orderBy('id', 'DESC')->get();
        return view('admin.editFood', compact('food', 'categories', 'restaurants'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'name' => 'required|min:3',
            'category' => 'required',
            'restaurant' => 'required',
            'price' => 'required|numeric',
            'photo' => 'image'
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileName = time() . '.' . $file->extension();
            $file->move(public_path('uploads/foods'), $fileName);

            if ($request->old_image != '') {
                File::delete(public_path() . '/uploads/foods/' . $request->old_image);
            }

            Food::findOrFail($id)->update([
                'name' => $request->name,
                'category_id' => $request->category,
                'restaurant_id' => $request->restaurant,
                'price' => $request->price,
                'discount_price' => $request->discount_price,
                'description' => $request->description,
                'is_popular' => $request->popular,
                'is_recommend' => $request->recommend,
                'status' => $request->status,
                'photo' => $fileName
            ]);
        } else {
            Food::findOrFail($id)->update([
                'name' => $request->name,
                'category_id' => $request->category,
                'restaurant_id' => $request->restaurant,
                'price' => $request->price,
                'discount_price' => $request->discount_price,
                'description' => $request->description,
                'is_popular' => $request->popular,
                'is_recommend' => $request->recommend,
                'status' => $request->status,
            ]);
        }

        return redirect()->back()->with('status', 'Food updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $food = Food::findOrFail($id);
        File::delete(public_path() . '/uploads/foods/' . $food->photo);
        $food->delete();
        return redirect()->back()->with('status', 'Food deleted successfully.');
    }
}
