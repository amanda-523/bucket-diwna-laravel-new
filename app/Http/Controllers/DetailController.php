<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class DetailController extends Controller
{
    public function index(Request $request, $id)
    {
        $products = Product::with(['galleries'])->where('slug', $id)->firstOrFail();

        return view('pages.detail', [
            'products' => $products
        ]);
    }

    /*public function add(Request $request, $id)
    {
        $data = [
            'products_id' => $id,
            'users_id' => Auth::user()->id,
        ];

        Cart::create($data);

        return redirect()->route('cart');
    }*/

    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        // Cek stok
        if ($product->stock <= 0) {
            return redirect()->back()->with('error', 'Stok produk habis.');
        }

        $data = [
            'products_id' => $id,
            'users_id' => Auth::user()->id,
        ];

        // Tambahkan ke keranjang
        Cart::create($data);

        // Kurangi stok produk
        $product->decrement('stock', 1);

        return redirect()->route('cart');
    }
}
