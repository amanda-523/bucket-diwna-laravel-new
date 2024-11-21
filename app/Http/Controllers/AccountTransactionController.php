<?php

namespace App\Http\Controllers;

use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountTransactionController extends Controller
{
    public function index()
    {
        $transactions = TransactionDetail::with(['transaction.user', 'product.galleries'])
            ->whereHas('transaction', function ($transaction) {
                $transaction->where('users_id', Auth::user()->id);
            })->get();

        return view('pages.account-transactions', [
            'transactions' => $transactions,
        ]);
    }

    public function details(Request $request, $id)
    {
        $transactions = TransactionDetail::with(['transaction.user', 'product.galleries'])
            ->findOrFail($id);

        return view('pages.account-transaction-details', [
            'transactions' => $transactions,
        ]);
    }
}
