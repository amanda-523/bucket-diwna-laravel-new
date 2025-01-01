<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::take(2)->get();
        $products = Product::with(['galleries'])->take(2)->get();
        // $bestSellers = Product::where('best_seller', true)->get();

        return view('pages.home', [
            'categories' => $categories,
            'products' => $products,
            // 'bestSellers' => $bestSellers
        ]);
    }
}
