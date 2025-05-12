@extends('layouts.app')

@section('title', $category->name)

@section('content')
<style>
    /* FluxUI Inspired Styles with refined sizes */
    .flux-btn {
        display: inline-block;
        padding: 0.6rem 1.2rem;
        font-size: 0.95rem;
        font-weight: 600;
        text-align: center;
        text-decoration: none;
        border-radius: 30px;
        cursor: pointer;
        transition: background-color 0.3s, transform 0.3s ease;
    }

    .flux-btn-primary {
        background-color: #007bff;
        color: white;
        border: 1px solid #007bff;
    }

    .flux-btn-primary:hover,
    .flux-btn-primary:focus {
        background-color: #0056b3;
        border-color: #0056b3;
    }

    .flux-card {
        border-radius: 8px;
        overflow: hidden;
        border: 1px solid #ddd;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
        background-color: white;
    }

    .flux-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
    }

    .flux-card img {
        width: 100%;
        height: 180px;
        object-fit: cover;
    }

    .flux-card-body {
        padding: 0.8rem;
        text-align: center;
    }

    .flux-card-title {
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 0.8rem;
        color: #343a40;
    }

    .flux-card-text {
        font-size: 0.95rem;
        color: #666;
        margin-bottom: 1rem;
    }

    .flux-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 1.25rem;
        margin-top: 2rem;
    }

    .flux-heading {
        font-size: 1.8rem;
        font-weight: bold;
        color: #343a40;
        margin-bottom: 0.8rem;
    }

    .flux-description {
        font-size: 1rem;
        color: #666;
        margin-bottom: 2rem;
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
    }
</style>

<div class="container">
    <h1 class="flux-heading">{{ $category->name }}</h1>
    <p class="flux-description">{{ $category->description }}</p>

    <h3 class="flux-heading">Products in this category</h3>

    <div class="flux-grid">
        @foreach ($category->products as $product)
            <div class="flux-card">
                <img src="https://via.placeholder.com/150" alt="{{ $product->name }}">
                <div class="flux-card-body">
                    <h5 class="flux-card-title">{{ $product->name }}</h5>
                    <p class="flux-card-text">{{ Str::limit($product->description, 100) }}</p>
                    <a href="{{ route('products.show', $product->slug) }}" class="flux-btn flux-btn-primary">View Product</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
