@extends('layouts.app')

@section('title', 'Categories')

@section('content')
<style>
    /* FluxUI Inspired Styles for Categories Page */
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

    .flux-btn-success {
        background-color: #28a745;
        color: white;
        border: 1px solid #28a745;
    }

    .flux-btn-success:hover,
    .flux-btn-success:focus {
        background-color: #218838;
        border-color: #1e7e34;
    }

    .flux-btn-danger {
        background-color: #dc3545;
        color: white;
        border: 1px solid #dc3545;
    }

    .flux-btn-danger:hover,
    .flux-btn-danger:focus {
        background-color: #c82333;
        border-color: #bd2130;
    }

    .flux-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 2rem;
        border: 1px solid #ddd; /* Border around the table */
    }

    .flux-table th, .flux-table td {
        padding: 0.8rem;
        text-align: left;
        border: 1px solid #ddd; /* Border around each cell */
    }

    .flux-table th {
        background-color: #f8f9fa;
        font-weight: 600;
    }

    .flux-table tr:nth-child(even) {
        background-color: #f2f2f2;
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

    .flux-action-btns {
        display: flex;
        gap: 0.5rem;
    }

    .flux-action-btns form {
        margin: 0;
    }
</style>

<div class="container">
    <h1 class="flux-heading text-primary">Categories</h1>

    <a href="{{ route('categories.create') }}" class="flux-btn flux-btn-success mb-3">Create New Category</a>

    <table class="flux-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Slug</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->slug }}</td>
                    <td class="flux-action-btns">
                        <a href="{{ route('categories.edit', $category->id) }}" class="flux-btn flux-btn-primary">Edit</a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="flux-btn flux-btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
