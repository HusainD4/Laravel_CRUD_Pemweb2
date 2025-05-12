@extends('layouts.app')

@section('title', 'Product Details')

@section('content')
<!-- FluxUI Custom Styling -->
<style>
    body {
        background-color: #f9fafb;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .card {
        border-radius: 12px;
        overflow: hidden;
        border: 1px solid #e5e5e5;
    }

    .card-header {
        background-color: #f8f9fa;
        padding: 1.5rem;
        font-size: 1.5rem;
        font-weight: 600;
        color: #343a40;
    }

    .card-body {
        padding: 2rem;
    }

    .product-image {
        width: 100%;
        height: auto;
        border-radius: 12px;
        object-fit: cover;
    }

    .product-info {
        padding-left: 2rem;
    }

    .product-price {
        font-size: 1.25rem;
        font-weight: bold;
        color: #007bff;
    }

    .product-description {
        margin-top: 1rem;
        color: #6c757d;
    }

    .back-btn {
        margin-top: 2rem;
        width: 100%;
        border-radius: 30px;
        padding: 1rem;
    }
</style>

<div class="container py-5">
    <div class="card shadow-sm">
        <div class="card-header">
            <h3>{{ $product->name }}</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('images/default-image.png') }}" 
                         alt="{{ $product->name }}" class="img-fluid product-image">
                </div>
                <div class="col-md-6 product-info">
                    <p><strong>Price:</strong> Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    <p><strong>Category:</strong> {{ $product->category->name }}</p>
                    <p><strong>Description:</strong> <span class="product-description">{{ $product->description }}</span></p>
                </div>
            </div>
            <a href="{{ route('homepage') }}" class="btn btn-primary mt-3 back-btn">Back to Products</a>
        </div>
    </div>
</div>

@endsection
