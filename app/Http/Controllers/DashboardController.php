<?php

namespace App\Http\Controllers;

use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        $products = Product::all();

        $totalProduk = $products->count();
        $stokHabis = $products->where('stock', 0)->count();
        $stokHampirHabis = $products->where('stock', '<=', 5)->where('stock', '>', 0)->count();
        $stokAman = $products->where('stock', '>', 5)->count();

        return view('dashboard', compact(
            'products',
            'totalProduk',
            'stokHabis',
            'stokHampirHabis',
            'stokAman'
        ));
    }
}
