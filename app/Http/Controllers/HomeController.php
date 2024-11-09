<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::with(['galleries'])->take(8)->get();
        $bestSellers = Product::where('best_seller', true)->get();

        return view('pages.home', [
            'categories' => $categories,
            'products' => $products,
            'bestSellers' => $bestSellers
        ]);
    }
}
