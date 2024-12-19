<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::with(['product.galleries', 'user'])->where('users_id', Auth::user()->id)->get();
        $address = Auth::user()->addresses()->where('is_selected', true)->first();

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

    public function selectAddress(Request $request)
    {
        $user = Auth::user();

        // Validasi bahwa `selected_address` dikirimkan
        $request->validate([
            'selected_address' => 'required|exists:addresses,id',
        ]);

        // Set semua alamat pengguna menjadi tidak dipilih
        $user->addresses()->update(['is_selected' => false]);

        // Set alamat yang dipilih sebagai `is_selected`
        $user->addresses()->where('id', $request->selected_address)->update(['is_selected' => true]);

        return redirect()->route('cart'); // Redirect kembali ke halaman cart
    }

    public function delete(Request $request, $id)
    {
        $cart = Cart::findOrFail($id);

        $cart->delete();

        return redirect()->route('cart');
    }

    public function success()
    {
        // set value statusnya success
        $data = [
            'transaction_status' => 'SUCCESS',
            'updated_at' => date("Y-m-d H:i:s"),
        ];
        // Cari data berdasarkan ID
        $transaction = Transaction::findOrFail($request->transaction_id);
        // Update nilai tersebut
        $transaction->update($data);
        //Create a resi after a successful payment.
        // set value statusnya success
        $datadetail = [
            'resi' => 'RES-'.$request->transaction_id,
            'updated_at' => date("Y-m-d H:i:s"),
        ];
        // Cari data berdasarkan ID
        $transactiondetail = TransactionDetail::findOrFail($request->transaction_id);
        // Update nilai tersebut
        $transactiondetail->update($datadetail);
        
        return view('pages.success');
    }
}
