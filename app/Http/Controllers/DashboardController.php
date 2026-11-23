<?php

namespace App\Http\Controllers;

use App\Models\{Customer, Product, Sale, User};

class DashboardController extends Controller
{
    public function __invoke()
    {
        return view('dashboard', [
            'productCount' => Product::count(), 'customerCount' => Customer::count(),
            'staffCount' => User::count(), 'salesCount' => Sale::count(),
            'recentSales' => Sale::with(['product', 'customer', 'staff'])->latest('created_at')->take(5)->get(),
        ]);
    }
}
