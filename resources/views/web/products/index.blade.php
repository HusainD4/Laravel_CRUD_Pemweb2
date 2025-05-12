@extends('layouts.app')

@section('title', 'Product List')

@section('content')
<div class="container">
    <h1 class="my-4 text-primary">Product List</h1>

    {{-- Pesan sukses setelah aksi --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('products.create') }}" class="btn btn-primary mb-4">Add New Product</a>

    {{-- Daftar produk --}}
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
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
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
