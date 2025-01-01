<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function pending(Request $request)
    {


        // Validasi input nomor resi jika diperlukan
        $request->validate([
            'transactions_id' => 'required|exists:transactions,id',
        ]);

        // Ambil transaksi berdasarkan ID
        $transaction = Transaction::findOrFail($request->transactions_id);

        // Update status menjadi pending
        $transaction->update([
            'status' => 'PENDING',
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        return view('pages.pending');
    }

    public function success(Request $request)
    {
        // Ambil nilai dari query string di URL
        $order_id = $request->query('order_id');
        $statusCode = $request->query('status_code');
        $transactionStatus = $request->query('transaction_status');

        // Temukan transaksi berdasarkan order_id
        // $transaction = Transaction::where('code', $order_id)->first();
        $transaction = Transaction::with('transactionDetail')->where('code', $order_id)->first();

        // Ubah nilai transaction_status jika settlement
        if ($transactionStatus === 'settlement') {
            $transactionStatus = 'success'; // Mengubah nilai settlement menjadi success
        }

        // Update status transaksi berdasarkan status dari Midtrans
        $transaction->update([
            'transaction_status' => strtoupper($transactionStatus), // Misalnya: settlement, pending, atau failure
            'updated_at' => now(),
        ]);

        // Tampilkan halaman sukses atau sesuai dengan status
        if ($transactionStatus === 'success') {
            return view('pages.success', ['transaction' => $transaction]);
        } elseif ($transactionStatus === 'pending') {
            return view('pages.pending', ['transaction' => $transaction]);
        } else {
            return view('pages.failed', ['transaction' => $transaction]);
        }

        // Jika transaksi tidak ditemukan
        return redirect()->route('home')->with('error', 'Transaksi tidak ditemukan.');
    }

    public function failed(Request $request)
    {
        // Validasi input nomor resi jika diperlukan
        $request->validate([
            'transactions_id' => 'required|exists:transactions,id',
        ]);

        // Ambil transaksi berdasarkan ID
        $transaction = Transaction::findOrFail($request->transactions_id);

        // Update status menjadi failed
        $transaction->update([
            'status' => 'FAILED',
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        return view('pages.failed', compact('transaction'));
    }
}
