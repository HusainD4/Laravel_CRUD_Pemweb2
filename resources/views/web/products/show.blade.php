@extends('layouts.app')

@section('title', 'Product Details')

@section('content')
<div class="container my-5">
    <div class="card">
        <div class="card-header">
            <h3>{{ $product->name }}</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('images/default-image.png') }}" 
                         alt="{{ $product->name }}" class="img-fluid">
                </div>
                <div class="col-md-6">
                    <p><strong>Price:</strong> Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    <p><strong>Category:</strong> {{ $product->category->name }}</p>
                    <p><strong>Description:</strong> {{ $product->description }}</p>
                </div>
            </div>
            <a href="{{ route('homepage') }}" class="btn btn-primary mt-3">Back to Products</a>
        </div>
    </div>
</div>
@endsection
