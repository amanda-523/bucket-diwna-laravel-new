<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::with(['product.galleries', 'user'])->where('users_id', Auth::user()->id)->get();
        // dd($carts);
        $address = Auth::user()->address()->where('is_selected', true)->first();
        // $address = User::find(1)->address()->where('is_selected', true)->first();
        // dd($address);

        return view('pages.cart', [
            'carts' => $carts,
            'address' => $address
        ]);
    }

    public function address()
    {
        $addresses = Auth::user()->addresses;
        return view('pages.address', compact('addresses'));
    }

    /*public function selectAddress(Request $request)
    {
        $user = Auth::user();

        // Validasi bahwa `selected_address` dikirimkan
        $request->validate([
            'selected_address' => 'required|exists:address,id',
        ]);

        // Set semua alamat pengguna menjadi tidak dipilih
        $user->address()->update(['is_selected' => false]);

        // Set alamat yang dipilih sebagai `is_selected`
        $user->address()->where('id', $request->selected_address)->update(['is_selected' => true]);

        return redirect()->route('cart'); // Redirect kembali ke halaman cart
    }*/

    public function selectAddress(Request $request)
    {
        $user = Auth::user();

        // Validasi bahwa 'selected_address' dikirimkan dan valid
        $validatedData = $request->validate([
            'selected_address' => 'required|exists:addresses,id',
        ]);

        $selectedAddressId = $validatedData['selected_address'];

        try {
            // Gunakan transaksi database untuk konsistensi data
            \DB::transaction(function () use ($user, $selectedAddressId) {
                // Set semua alamat pengguna menjadi tidak dipilih
                $user->addresses()->update(['is_selected' => false]);

                // Set alamat yang dipilih sebagai `is_selected`
                $user->addresses()->where('id', $selectedAddressId)->update(['is_selected' => true]);
            });

            return redirect()->route('cart')->with('success', 'Alamat berhasil dipilih.');
        } catch (\Exception $e) {
            // Tangani error jika terjadi masalah
            return redirect()->route('cart')->with('error', 'Terjadi kesalahan saat memilih alamat.');
        }
    }

    public function delete(Request $request, $id)
    {
        $cart = Cart::findOrFail($id);

        $cart->delete();

        return redirect()->route('cart');
    }
}
