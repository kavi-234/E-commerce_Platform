<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // Fetch all products from the database
        $products = Product::all();

        // Pass the products to the view
        return view('welcome', compact('products'));
    }
}
