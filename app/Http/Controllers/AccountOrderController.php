<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountOrderController extends Controller
{
    public function index()
    {
        return view('pages.account-orders');
    }

    public function detail()
    {
        return view('pages.account-orders-details');
    }
}
