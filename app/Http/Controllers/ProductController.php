<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // Menampilkan daftar produk dengan paginasi
    public function index()
    {
        // Ganti get() dengan paginate()
        $products = Product::with('category')->paginate(8); // 8 produk per halaman
        return view('web.products.index', compact('products'));
    }

    // Menampilkan form input produk
    public function create()
    {
        $categories = Category::all();
        return view('web.products.create', compact('categories'));
    }

    // Menyimpan produk baru
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048', // Optional image field
        ]);

        // Handling file upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            // Store image in public directory
            $imagePath = $request->file('image')->store('product_images', 'public');
        }

        // Create product record in database
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'image' => $imagePath,  // Save image path
        ]);

        // Redirect back to the product index with a success message
        return redirect()->route('products.index')->with('success', 'Product created successfully!');
    }

    // Menampilkan form edit produk
    public function edit($id)
    {
        // Fetch product by ID
        $product = Product::findOrFail($id);
        // Fetch all categories for the dropdown
        $categories = Category::all();
        return view('web.products.edit', compact('product', 'categories'));
    }

    // Update produk
    public function update(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048', // Optional image field
        ]);

        // Fetch the product to update
        $product = Product::findOrFail($id);

        // Check if there is a new image and delete the old one if necessary
        $imagePath = $product->image;
        if ($request->hasFile('image')) {
            // Delete old image from storage if it exists
            if ($product->image && Storage::exists('public/' . $product->image)) {
                Storage::delete('public/' . $product->image);
            }
            // Store the new image
            $imagePath = $request->file('image')->store('product_images', 'public');
        }

        // Update the product with new data
        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'image' => $imagePath,  // Update the image path
        ]);

        // Redirect to the product index page with success message
        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }

    // Hapus produk
    public function destroy($id)
    {
        // Fetch product by ID
        $product = Product::findOrFail($id);

        // Delete the image file if it exists
        if ($product->image && Storage::exists('public/' . $product->image)) {
            Storage::delete('public/' . $product->image);
        }

        // Delete the product from database
        $product->delete();

        // Redirect back with success message
        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }

    public function show($id)
    {
        // Fetch the product by its ID
        $product = Product::findOrFail($id);

        // Return the view for showing the product's details
        return view('web.products.show', compact('product'));
    }

}
