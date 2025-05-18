<x-layouts.app title="Edit Product">

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

    .flux-input {
        display: inline-block;
        padding: 0.8rem;
        font-size: 1rem;
        font-weight: 600;
        border-radius: 10px;
        border: 1px solid #ddd;
        width: 100%;
        transition: border-color 0.3s;
    }

    .flux-input:focus {
        border-color: #007bff;
    }

    .flux-select {
        display: inline-block;
        padding: 0.8rem;
        font-size: 1rem;
        font-weight: 600;
        border-radius: 10px;
        border: 1px solid #ddd;
        width: 100%;
        transition: border-color 0.3s;
    }

    .flux-select:focus {
        border-color: #007bff;
    }

    .flux-form-group {
        margin-bottom: 1.5rem;
    }

    .flux-form-label {
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
        color: #333;
    }

    .invalid-feedback {
        display: block;
        font-size: 0.9rem;
        color: #dc3545;
    }

    .flux-img-preview {
        margin-top: 1rem;
    }
</style>

<div class="container">
    <h1 class="my-4 text-primary">Edit Product</h1>

    {{-- Tampilkan error validasi jika ada --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Ada kesalahan pada input Anda.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form untuk mengedit produk --}}
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="flux-form-group">
            <label for="name" class="flux-form-label">Product Name</label>
            <input 
                type="text" 
                class="flux-input @error('name') is-invalid @enderror" 
                id="name" 
                name="name" 
                value="{{ old('name', $product->name) }}" 
                required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="flux-form-group">
            <label for="price" class="flux-form-label">Price</label>
            <input 
                type="number" 
                class="flux-input @error('price') is-invalid @enderror" 
                id="price" 
                name="price" 
                value="{{ old('price', $product->price) }}" 
                required>
            @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="flux-form-group">
            <label for="category_id" class="flux-form-label">Category</label>
            <select 
                class="flux-select @error('category_id') is-invalid @enderror" 
                id="category_id" 
                name="category_id" 
                required>
                <option value="">-- Select Category --</option>
                @foreach ($categories as $category)
                    <option 
                        value="{{ $category->id }}" 
                        {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
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
                class="flux-input @error('image') is-invalid @enderror" 
                id="image" 
                name="image">
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Tampilkan gambar lama jika ada --}}
        @if($product->image)
            <div class="flux-img-preview">
                <label class="flux-form-label">Current Image</label><br>
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="150">
            </div>
        @endif

        <button type="submit" class="flux-btn flux-btn-primary">Update Product</button>
    </form>
</div>

</x-layouts.app>
