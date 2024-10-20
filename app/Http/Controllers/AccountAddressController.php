<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountAddressController extends Controller
{
    public function index()
    {
        return view('pages.account-address');
    }

    public function edit()
    {
        return view('pages.account-address-edit');
    }

    public function new()
    {
        return view('pages.account-address-new');
    }
}
