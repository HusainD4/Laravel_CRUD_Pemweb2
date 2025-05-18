
<x-layouts.app title="Product List">
<style>
    /* FluxUI Inspired Styles */
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
    .flux-input,
    .flux-select {
        display: block;
        padding: 0.8rem;
        font-size: 1rem;
        font-weight: 600;
        border-radius: 10px;
        border: 1px solid #ddd;
        width: 100%;
        transition: border-color 0.3s;
        box-sizing: border-box;
    }
    .flux-input:focus,
    .flux-select:focus {
        border-color: #007bff;
        outline: none;
    }
    .flux-form-group {
        margin-bottom: 1.5rem;
    }
    .flux-form-label {
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
        color: #333;
        display: block;
    }
    .invalid-feedback {
        display: block;
        font-size: 0.9rem;
        color: #dc3545;
        margin-top: 0.25rem;
    }
</style>

<div class="container">
    <h1 class="my-4 text-primary">Create New Product</h1>

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Oops!</strong> Please fix the errors below:<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form --}}
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="flux-form-group">
            <label for="name" class="flux-form-label">Product Name</label>
            <input 
                type="text" 
                id="name" 
                name="name" 
                class="flux-input @error('name') is-invalid @enderror" 
                value="{{ old('name') }}" 
                required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="flux-form-group">
            <label for="price" class="flux-form-label">Price</label>
            <input 
                type="number" 
                id="price" 
                name="price" 
                class="flux-input @error('price') is-invalid @enderror" 
                value="{{ old('price') }}" 
                required>
            @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="flux-form-group">
            <label for="category_id" class="flux-form-label">Category</label>
            <select 
                id="category_id" 
                name="category_id" 
                class="flux-select @error('category_id') is-invalid @enderror" 
                required>
                <option value="">-- Select Category --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="flux-form-group">
            <label for="image" class="flux-form-label">Product Image</label>
            <input 
                type="file" 
                id="image" 
                name="image" 
                class="flux-input @error('image') is-invalid @enderror">
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="flux-btn flux-btn-primary">Create Product</button>
    </form>
</div>
</x-layout.app>
