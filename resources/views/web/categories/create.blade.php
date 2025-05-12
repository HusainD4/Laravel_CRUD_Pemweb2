@extends('layouts.app')

@section('title', 'Create Category')

@section('content')
<style>
    /* FluxUI Inspired Styles */
    .flux-btn {
        display: inline-block;
        padding: 0.6rem 1.2rem;
        font-size: 1rem;
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

    .flux-form-group {
        margin-bottom: 1.5rem;
    }

    .flux-form-label {
        font-size: 1rem;
        font-weight: 600;
        color: #343a40;
        margin-bottom: 0.5rem;
    }

    .flux-form-control {
        width: 100%;
        padding: 0.8rem;
        font-size: 1rem;
        border-radius: 8px;
        border: 1px solid #ddd;
        box-sizing: border-box;
    }

    .flux-form-control:focus {
        border-color: #007bff;
        outline: none;
    }

    .flux-form-text {
        font-size: 0.9rem;
        color: #6c757d;
        margin-top: 0.25rem;
    }

    .flux-heading {
        font-size: 2rem;
        font-weight: bold;
        color: #343a40;
        margin-bottom: 1rem;
    }

    .flux-description {
        font-size: 1.1rem;
        color: #666;
        margin-bottom: 2rem;
    }
</style>

<div class="container">
    <h1 class="flux-heading text-primary">Create New Category</h1>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        
        <div class="flux-form-group">
            <label for="name" class="flux-form-label">Category Name</label>
            <input 
                type="text" 
                class="flux-form-control @error('name') is-invalid @enderror" 
                id="name" 
                name="name" 
                required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="flux-form-group">
            <label for="slug" class="flux-form-label">Slug</label>
            <input 
                type="text" 
                class="flux-form-control @error('slug') is-invalid @enderror" 
                id="slug" 
                name="slug" 
                required>
            <small class="flux-form-text">
                Slug digunakan untuk URL kategori. Biasanya berupa huruf kecil tanpa spasi, dan spasi digantikan dengan tanda hubung (-). Contoh: "pakaian" untuk kategori "Pakaian".
            </small>
            @error('slug')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="flux-btn flux-btn-primary">Create Category</button>
    </form>
</div>

@endsection
