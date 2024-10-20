<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        return view('pages.review');
    }

    public function detail()
    {
        return view('pages.review-details');
    }
}
