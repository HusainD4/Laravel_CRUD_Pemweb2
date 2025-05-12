<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class HomepageController extends Controller
{
    public function index()
    {
        // Menentukan judul halaman
        $title = "HomePage";

        // Mengambil semua kategori
        $categories = Category::all();

        // Mengambil produk terbaru dan menggunakan paginasi (8 produk per halaman)
        $products = Product::latest()->paginate(8); // Mendukung links() di view untuk paginasi

        // Mengirim data ke view
        return view('web.homepage', compact('title', 'categories', 'products'));
    }
}
