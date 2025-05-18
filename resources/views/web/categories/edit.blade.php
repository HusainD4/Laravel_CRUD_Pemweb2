@extends('layouts.app')

@section('title', 'Edit Category')

@section('content')
<style>
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
    <h1 class="flux-heading text-primary">Edit Category</h1>

    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="flux-form-group">
            <label for="name" class="flux-form-label">Category Name</label>
            <input 
                type="text" 
                name="name" 
                id="name" 
                class="flux-form-control @error('name') is-invalid @enderror" 
                value="{{ $category->name }}" 
                required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="flux-form-group">
            <label for="slug" class="flux-form-label">Slug</label>
            <input 
                type="text" 
                name="slug" 
                id="slug" 
                class="flux-form-control @error('slug') is-invalid @enderror" 
                value="{{ $category->slug }}" 
                required>
            @error('slug')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="flux-btn flux-btn-primary">Update Category</button>
    </form>
</div>

@endsection
