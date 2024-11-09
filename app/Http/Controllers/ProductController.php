<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['galleries'])->take(8)->get();
        $bestSellers = Product::where('best_seller', true)->get();

        return view(
            'pages.products',
            [
                'products' => $products,
                'bestSellers' => $bestSellers
            ]
        );
    }

    public function product()
    {
        $products = Product::with(['galleries'])->get();

        return view('pages.all-product', [
            'products' => $products,
        ]);
    }

    public function best()
    {
        $bestSellers = Product::where('best_seller', true)->get();

        return view('pages.best-seller', [
            'bestSellers' => $bestSellers,
        ]);
    }
}
