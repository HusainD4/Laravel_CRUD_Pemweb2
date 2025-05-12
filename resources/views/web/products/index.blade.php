@extends('layouts.app')

@section('title', 'Product List')

@section('content')
<style>
    /* FluxUI Inspired Button Styles */
    .flux-btn {
        display: inline-block;
        padding: 0.8rem 1.5rem;
        font-size: 1rem;
        font-weight: 600;
        text-align: center;
        text-decoration: none;
        border-radius: 50px;
        cursor: pointer;
        transition: background-color 0.3s, transform 0.3s ease;
    }

    .flux-btn:hover,
    .flux-btn:focus {
        transform: scale(1.05);
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

    .flux-btn-warning {
        background-color: #ffc107;
        color: white;
        border: 1px solid #ffc107;
    }

    .flux-btn-warning:hover,
    .flux-btn-warning:focus {
        background-color: #e0a800;
        border-color: #e0a800;
    }

    .flux-btn-danger {
        background-color: #dc3545;
        color: white;
        border: 1px solid #dc3545;
    }

    .flux-btn-danger:hover,
    .flux-btn-danger:focus {
        background-color: #c82333;
        border-color: #c82333;
    }

    .flux-btn-lg {
        padding: 1rem 2rem;
        font-size: 1.2rem;
    }

    .flux-btn-sm {
        padding: 0.4rem 0.8rem;
        font-size: 0.9rem;
    }
</style>

<div class="container">
    <h1 class="my-4 text-primary">Product List</h1>

    {{-- Pesan sukses setelah aksi --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-4">
        <!-- Add New Product Button -->
        <a href="{{ route('products.create') }}" class="flux-btn flux-btn-primary flux-btn-lg">Add New Product</a>
    </div>

    {{-- Product List --}}
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Image</th> <!-- New Image column -->
                <th>Name</th>
                <th>Price</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $index => $product)
                <tr>
                    <td>{{ ($products->currentPage() - 1) * $products->perPage() + $index + 1 }}</td>
                    <td>
                        <!-- Display the product image -->
                        <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('images/default-image.png') }}" 
                             alt="{{ $product->name }}" class="img-thumbnail" style="width: 100px; height: 100px; object-fit: cover;">
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                    <td>{{ $product->category->name ?? '-' }}</td>
                    <td>
                        <!-- Edit Button -->
                        <a href="{{ route('products.edit', $product->id) }}" class="flux-btn flux-btn-warning btn-sm">Edit</a>

                        <!-- Delete Button -->
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="flux-btn flux-btn-danger btn-sm"
                                onclick="return confirm('Are you sure you want to delete this product?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">No products available.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center">
        {{ $products->links() }}
    </div>
</div>

@endsection
