<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;


class WelcomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('welcome', compact('products'));
    }
}