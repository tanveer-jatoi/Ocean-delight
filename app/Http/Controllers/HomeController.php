<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $featuredProducts = Product::with('category')->take(8)->get();
        $recentCatch = Product::with('category')->latest()->take(6)->get();

        return view('home', compact('categories', 'featuredProducts', 'recentCatch'));
    }
}
