<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountTransactionController extends Controller
{
    public function index()
    {
        $transaction = TransactionDetail::with(['transaction.user', 'product.galleries'])
            ->whereHas('transaction', function ($transaction) {
                $transaction->where('users_id', Auth::user()->id);
            })->get();

        return view('pages.account-transactions', [
            'transaction' => $transaction,
        ]);
    }

    public function details(Request $request, $id)
    {
        $transaction = TransactionDetail::with([
            'transaction.user.address.provinces', // Menggunakan singular
            'transaction.user.address.regencies', // Menggunakan singular
            'product.galleries'
        ])->findOrFail($id);

        $product = $transaction->product;

        return view('pages.account-transaction-details', [
            'transaction' => $transaction,
            'product' => $product,
        ]);
    }

    public function show($id)
    {
        $transaction = Transaction::with(['details.product', 'reviews'])
            ->where('id', $id)
            ->where('users_id', auth()->id())
            ->firstOrFail();

        // Cek apakah pengguna telah memberikan review
        $hasReview = $transaction->reviews->isNotEmpty();

        return view('pages.account-transaction-details', compact('transaction', 'hasReview'));
    }
}
