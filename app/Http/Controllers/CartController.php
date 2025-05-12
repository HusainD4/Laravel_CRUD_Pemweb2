<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Tambahkan produk ke keranjang belanja.
     */
    public function add($id)
    {
        $product = Product::findOrFail($id); // Cari produk berdasarkan ID

        $cart = session()->get('cart', []);

        // Jika produk sudah ada di keranjang, tambahkan jumlahnya
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            // Jika belum ada, tambahkan produk baru ke keranjang
            $cart[$id] = [
                'name' => $product->name,
                'quantity' => 1,
                'price' => $product->price,
                'image' => $product->image
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    /**
     * Tampilkan isi keranjang.
     */
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    /**
     * Hapus item dari keranjang.
     */
    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Produk dihapus dari keranjang.');
    }

    /**
     * Kosongkan seluruh keranjang.
     */
    public function clear()
    {
        session()->forget('cart');
        return redirect()->back()->with('success', 'Keranjang berhasil dikosongkan.');
    }
}
