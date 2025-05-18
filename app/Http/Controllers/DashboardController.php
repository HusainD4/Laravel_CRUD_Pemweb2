<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Product;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil data
        $categories = Category::all();
        $products = Product::all();
        $productCount = Product::count();
        $categoryCount = Category::count();
        $userCount = User::count();

        // Kirim semua data ke view
        return view('dashboard', [
            'categories' => $categories,
            'products' => $products,
            'productCount' => $productCount,
            'categoryCount' => $categoryCount,
            'userCount' => $userCount,
        ]);
    }
}
