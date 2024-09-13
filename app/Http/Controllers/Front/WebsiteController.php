<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Category;
use App\Models\Restaurant;

class WebsiteController extends Controller
{
    public function index() {
        $restaurants = Restaurant::orderBy('id', 'DESC')->get();
        return view('front.index', compact('restaurants'));
    }

    public function foods() {
        $recommends = Food::where('is_recommend', 'yes')->limit(6)->get();
        $populars = Food::where('is_popular', 'yes')->limit(6)->get();
        $categories = Category::orderBy('id', 'DESC')->get();
        $restaurants = Restaurant::orderBy('id', 'DESC')->get();

        $latests = Food::orderBy('id', 'DESC')->limit(6)->get();
        $foods = Food::orderBy('id', 'DESC')->paginate(8);
        return view('front.foods', compact('recommends', 'populars', 'categories', 'restaurants', 'latests', 'foods'));
    }

    public function categtory_foods($id) {
        $recommends = Food::where(['category_id' => $id, 'is_recommend' => 'yes'])->limit(6)->get();
        $populars = Food::where(['category_id' => $id, 'is_popular' => 'yes'])->limit(6)->get();
        $categories = Category::orderBy('id', 'DESC')->get();
        $restaurants = Restaurant::orderBy('id', 'DESC')->get();

        $latests = Food::orderBy('id', 'DESC')->limit(6)->get();
        $foods = Food::where('category_id', $id)->orderBy('id', 'DESC')->paginate(8);
        $category = Category::findOrFail($id);
        return view('front.category-foods', compact('recommends', 'populars', 'categories', 'restaurants', 'latests', 'foods', 'category'));
    }

    public function restaurant_foods($id) {
        $recommends = Food::where(['restaurant_id' => $id, 'is_recommend' => 'yes'])->limit(6)->get();
        $populars = Food::where(['restaurant_id' => $id, 'is_popular' => 'yes'])->limit(6)->get();
        $categories = Category::orderBy('id', 'DESC')->get();
        $restaurants = Restaurant::orderBy('id', 'DESC')->get();

        $latests = Food::orderBy('id', 'DESC')->limit(6)->get();
        $foods = Food::where('restaurant_id', $id)->orderBy('id', 'DESC')->paginate(8);
        $restaurant = Restaurant::findOrFail($id);
        return view('front.restaurant-foods', compact('recommends', 'populars', 'categories', 'restaurants', 'latests', 'foods', 'restaurant'));
    }

    public function search_foods(Request $request) {
        $categories = Category::orderBy('id', 'DESC')->get();
        $restaurants = Restaurant::orderBy('id', 'DESC')->get();

        $latests = Food::orderBy('id', 'DESC')->limit(6)->get();
        $search_foods = Food::where('name', 'like', '%'.$request->search.'%')->orderBy('id', 'DESC')->paginate(8);
        $search_keyword = $request->search;
        return view('front.search-foods', compact('categories', 'restaurants', 'latests', 'search_foods', 'search_keyword'));
    }

    public function contact() {
        return view('front.contact');
    }

    public function termsCondition() {
        return view('front.terms&condition');
    }

    public function privacyPolicy() {
        return view('front.privacyPolicy');
    }

    public function returnPolicy() {
        return view('front.returnPolicy');
    }
}
