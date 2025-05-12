@extends('layouts.app')

@section('title', 'Create Category')

@section('content')
<div class="container">
    <h1 class="my-4 text-primary">Create New Category</h1>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" required>
            <small class="form-text text-muted">
                Slug digunakan untuk URL kategori. Biasanya berupa huruf kecil tanpa spasi, dan spasi digantikan dengan tanda hubung (-). Contoh: "pakaian" untuk kategori "Pakaian".
            </small>
        </div>

        <button type="submit" class="btn btn-primary">Create Category</button>
    </form>
</div>
@endsection
