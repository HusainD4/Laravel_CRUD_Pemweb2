@extends('layouts.app')

@section('title', $title)

@section('content')
<!-- FluxUI Custom Styling -->
<style>
    body {
        background-color: #f9fafb;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .product-card {
        transition: all 0.3s ease;
        border-radius: 12px;
        overflow: hidden;
        background-color: #fff;
        border: 1px solid #e5e5e5;
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.15);
    }

    .product-image {
        position: relative;
        padding-top: 100%; /* Keeps the aspect ratio 1:1 */
        overflow: hidden;
    }

    .product-image img {
        position: absolute;
        top: 0;
        left: 0;
        object-fit: cover;
        width: 100%;
        height: 100%;
    }

    .product-card .card-body {
        padding: 1rem;
    }

    .product-title {
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    .product-price {
        font-size: 1.1rem;
        font-weight: bold;
        color: #007bff;
    }

    .product-stock {
        font-size: 0.9rem;
        color: #28a745;
    }

    .product-rating {
        color: #ffc107;
    }

    .btn-buy {
        margin-top: 10px;
        width: 100%;
        border-radius: 30px;
    }

    .section-title {
        font-weight: bold;
        font-size: 2rem;
        color: #343a40;
        margin-bottom: 30px;
    }

    .pagination > .active > span {
        background-color: #007bff;
        border-color: #007bff;
    }

    .text-muted {
        color: #6c757d;
    }

    /* Add custom spacing and adjustments */
    .product-card-container {
        margin-top: 50px;
    }

    .product-rating-star {
        font-size: 1.1rem;
    }
</style>

<div class="container py-5 product-card-container">
    <div class="text-center mb-4">
        <h1 class="section-title">ATUN TAILOR</h1>
        <p class="text-muted">Temukan berbagai pilihan pakaian custom terbaik untuk kebutuhan Anda</p>
    </div>

    <h2 class="mb-4">Produk Unggulan</h2>

    <div class="row">
        @forelse ($products as $product)
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="product-card h-100 p-3">
                    <div class="product-image">
                        <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('images/default-image.png') }}" alt="{{ $product->name }}">
                    </div>
                    <div class="card-body text-center">
                        <div class="product-title">{{ $product->name }}</div>
                        <div class="product-price">Rp {{ number_format($product->price, 0, ',', '.') }}</div>

                        <!-- Rating Section -->
                        <div class="product-rating mb-2">
                            ★★★★☆  {{-- This could be dynamic if you have a rating system --}}
                        </div>
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-outline-primary btn-sm btn-buy">Lihat Detail</a>
                        
                        <!-- Add to Cart Form -->
                        <form action="{{ route('cart.add', $product->id) }}" method="POST" class="mt-2">
                            @csrf
                            <button class="btn btn-primary btn-sm btn-buy" {{ $product->stock <= 0 ? 'enable' : '' }}>
                                Tambah ke Keranjang
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center text-muted">
                <p>Belum ada produk tersedia.</p>
            </div>
        @endforelse
    </div>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center mt-4">
        {{ $products->links() }}
    </div>
</div>

@endsection
