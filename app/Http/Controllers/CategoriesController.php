<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    // Menampilkan daftar kategori
    public function index()
    {
        $categories = Category::all();
        return view('web.categories.index', compact('categories'));
    }

    // Menampilkan form tambah kategori
    public function create()
    {
        // Jika perlu, Anda bisa menambahkan otorisasi di sini
        // $this->authorize('create', Category::class);

        return view('web.categories.create');
    }

    // Menyimpan kategori baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|max:255|unique:categories,name',
        ]);

        // Membuat slug yang unik jika ada kategori yang sudah memiliki nama yang sama
        $slug = Str::slug($request->name);
        if (Category::where('slug', $slug)->exists()) {
            $slug = $slug . '-' . time(); // Menambahkan angka untuk menghindari duplikasi slug
        }

        // Menyimpan kategori baru
        Category::create([
            'name' => $request->name,
            'slug' => $slug,
        ]);

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    // Menampilkan detail kategori (opsional, bisa dihapus jika tidak digunakan)
    public function show($id)
    {
        // Jika belum diperlukan, Anda bisa menghapus atau mengembangkannya
        $category = Category::findOrFail($id);
        return view('web.categories.show', compact('category'));
    }

    // Form edit
    public function edit($id)
    {
        $category = Category::findOrFail($id);

        // Jika perlu, Anda bisa menambahkan otorisasi di sini
        // $this->authorize('update', $category);

        return view('web.categories.edit', compact('category'));
    }

    // Menyimpan perubahan kategori
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|max:255|unique:categories,name,' . $id,
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    // Hapus kategori
    public function destroy($id)
    {
        // Mengecek apakah kategori ada
        $category = Category::findOrFail($id);
        
        // Jika perlu, Anda bisa menambahkan otorisasi di sini
        // $this->authorize('delete', $category);

        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
