<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Cart;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\User;


use Exception;

use Midtrans\Snap;
use Midtrans\Config;
// use Midtrans\Transaction;

class CheckoutController extends Controller
{
    public function process(Request $request)
    {
        // Save users data
        $user = Auth::user();
        $user->update($request->except('total_price'));

        // Proses checkout
        $code = 'STORE-' . mt_rand(00000, 99999);
        $carts = Cart::with(['product', 'user'])->where('users_id', Auth::user()->id)->get();

        // Transaction create
        //dd($request->all());
        //print($request->shipping_price);
        //print(Auth::user()->id);
        $transaction = Transaction::create([
            'users_id' => Auth::user()->id,
            'shipping_price' => $request->shipping_price,
            'total_price' => (int) $request->total_price,
            'transaction_status' => 'PENDING',
            'code' => $code,
        ]);

        //print($carts);

        //dd($transaction);
        //exit;
        /*Transaction::factory([
            'users_id' => Auth::user()->id,
            'shipping_price' => $request->shipping_price,
            'total_price' => (int) $request->total_price,
            'transaction_status' => 'PENDING',
            'code' => $code,
        ])->create();
        exit();
        $transaction = Transaction::create([
            'users_id' => Auth::user()->id,
            'shipping_price' => $request->shipping_price,
            'total_price' => (int) $request->total_price,
            'transaction_status' => 'PENDING',
            'code' => $code,
        ]);
        echo "cex";
        exit;*/
        foreach ($carts as $cart) {
            $trx = 'TRX-' . mt_rand(00000, 99999);

            TransactionDetail::create([
                'transactions_id' => $transaction->id,
                'products_id' => $cart->product->id,
                'price' => $cart->product->price,
                'shipping_status' => 'PENDING',
                'resi' => '',
                'code' => $trx,
            ]);
        }

        //exit;
        // Delete cart data
        Cart::where('users_id', Auth::user()->id)->delete();

        // Config midtrans
        Config::$serverKey = config('services.midtrans.merchantId');
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        // $callback_url = route('midtrans_callback');

        // Buat array untuk dikirim ke midtrans
        $midtrans = [
            'transaction_details' => [
                'order_id' => $code,
                'gross_amount' => (int) $request->total_price,
            ],
            'customer_details' => [
                'name' => Auth::user()->name,
                'email' => Auth::user()->email,
            ],
            'enabled_payments' => [
                'gopay',
                'bca_va',
                'bank_transfer',
                'indomaret',
            ],
            'finish_redirect_url' => route('success'),
            'vtweb' => []
        ];

        try {
            // Get Snap Payment Page URL
            $paymentUrl = Snap::createTransaction($midtrans)->redirect_url;

            // print_r($paymentUrl);
            // exit;
            // Redirect to Snap Payment Page
            return redirect($paymentUrl);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function callback(Request $request)
    {
        //
        $status = $request->input('transaction_status');

        if ($status == "pending") {
            echo "status == pending";
        } else if ($status == "settlement") {
            return redirect()->route('success');
        } else {
            echo "status == error";
        }
    }
}
