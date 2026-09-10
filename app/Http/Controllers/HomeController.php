<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::where('is_active', true)->get();
        $featuredProducts = Product::active()->featured()->with('category')->take(8)->get();
        $recentCatch = Product::active()->with('category')->latest()->take(6)->get();

        return view('home', compact('categories', 'featuredProducts', 'recentCatch'));
    }
}
