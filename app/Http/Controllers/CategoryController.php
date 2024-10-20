<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('pages.categories');
    }

    public function detail()
    {
        return view('pages.categories-details');
    }
}
