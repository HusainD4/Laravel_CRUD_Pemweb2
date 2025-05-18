<x-layouts.app title="Product List">

    <style>
        /* Container Card - full width tanpa margin/padding kiri kanan */
        .container {
            max-width: 100%;
            margin: 3rem 0;
            padding: 2rem 1rem; /* padding horizontal dikurangi jadi 1rem */
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 3px 15px rgba(0,0,0,0.1);
            box-sizing: border-box;
        }

        /* Heading */
        h1 {
            font-weight: 700;
            color: #007bff;
            margin-bottom: 1.5rem;
            font-size: 2rem;
            user-select: none;
            padding-left: 1rem;
        }

        /* Alert Success */
        .alert-success {
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
            padding: 1rem 1.25rem;
            border-radius: 6px;
            margin-bottom: 1.75rem;
            font-weight: 600;
            user-select: none;
            margin-left: 1rem;
            margin-right: 1rem;
        }

        /* FluxUI Buttons */
        .flux-btn {
            display: inline-block;
            padding: 0.6rem 1.3rem;
            font-size: 0.95rem;
            font-weight: 600;
            text-align: center;
            text-decoration: none;
            border-radius: 30px;
            cursor: pointer;
            transition: background-color 0.25s ease, box-shadow 0.25s ease, transform 0.2s ease;
            border: 1.5px solid transparent;
            user-select: none;
            line-height: 1.3;
            box-shadow: none;
            min-width: 85px;
        }

        .flux-btn:hover,
        .flux-btn:focus {
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0,0,0,0.12);
            outline: none;
        }

        .flux-btn-primary {
            background-color: #007bff;
            color: white;
            border-color: #007bff;
            box-shadow: 0 2px 6px rgba(0,123,255,0.4);
        }

        .flux-btn-primary:hover,
        .flux-btn-primary:focus {
            background-color: #0056b3;
            border-color: #004085;
            box-shadow: 0 6px 14px rgba(0,86,179,0.5);
        }

        .flux-btn-warning {
            background-color: #ffc107;
            color: #212529;
            border-color: #ffc107;
            box-shadow: 0 2px 6px rgba(255,193,7,0.4);
        }

        .flux-btn-warning:hover,
        .flux-btn-warning:focus {
            background-color: #e0a800;
            border-color: #c69500;
            box-shadow: 0 6px 14px rgba(224,168,0,0.5);
        }

        .flux-btn-danger {
            background-color: #dc3545;
            color: white;
            border-color: #dc3545;
            box-shadow: 0 2px 6px rgba(220,53,69,0.4);
        }

        .flux-btn-danger:hover,
        .flux-btn-danger:focus {
            background-color: #bd2130;
            border-color: #a71d2a;
            box-shadow: 0 6px 14px rgba(189,33,48,0.5);
        }

        .flux-btn-lg {
            padding: 1rem 2rem;
            font-size: 1.15rem;
            min-width: 160px;
        }

        .flux-btn-sm {
            padding: 0.35rem 0.85rem;
            font-size: 0.85rem;
            min-width: 70px;
        }

        /* Spacing between buttons */
        .actions > *:not(:last-child) {
            margin-right: 0.6rem;
        }

        /* Table Styling tanpa border */
        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 0.75rem;
            margin-top: 1rem;
            font-size: 0.95rem;
            box-sizing: border-box;
        }

        table thead tr {
            background-color: #f1f3f5;
            border-radius: 10px;
        }

        table th,
        table td {
            /* hilangkan border */
            border: none;
            padding: 0.75rem 1rem;
            text-align: center;
            vertical-align: middle;
            user-select: none;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            border-radius: 8px;
        }

        table tbody tr {
            /* hilangkan background hover karena sudah ada jarak */
            background: none;
        }

        /* Product Image */
        .product-image {
            width: 90px;
            height: 90px;
            object-fit: cover;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            transition: transform 0.25s ease;
        }

        .product-image:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 20px rgba(0,123,255,0.3);
        }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            padding-left: 0;
            list-style: none;
            border-radius: 0.25rem;
            margin-top: 2rem;
            user-select: none;
        }

        .pagination li {
            margin: 0 0.25rem;
        }

        .pagination li a,
        .pagination li span {
            position: relative;
            display: block;
            padding: 0.5rem 0.75rem;
            line-height: 1.25;
            color: #007bff;
            background-color: #fff;
            border: 1px solid #dee2e6;
            border-radius: 0.25rem;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out;
        }

        .pagination li a:hover {
            background-color: #e9f1ff;
            border-color: #007bff;
            color: #0056b3;
        }

        .pagination li.active span {
            z-index: 1;
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
            cursor: default;
        }

        /* Responsive Container */
        @media (max-width: 768px) {
            .container {
                padding: 1rem 0.5rem;
                margin: 1.5rem 0;
            }

            h1 {
                padding-left: 0.5rem;
                font-size: 1.75rem;
            }

            .flux-btn-lg {
                min-width: auto;
                padding: 0.8rem 1.4rem;
                font-size: 1rem;
            }

            .product-image {
                width: 70px;
                height: 70px;
            }

            table th, table td {
                padding: 0.5rem 0.75rem;
            }
        }
    </style>

    <div class="container">
        <h1>Product List</h1>

        @if(session('success'))
            <div class="alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-4" style="padding-left:1rem;">
            <a href="{{ route('products.create') }}" class="flux-btn flux-btn-primary flux-btn-lg">Add New Product</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th style="width: 5%;">No</th>
                    <th style="width: 12%;">Image</th>
                    <th style="width: 30%;">Name</th>
                    <th style="width: 15%;">Price</th>
                    <th style="width: 20%;">Category</th>
                    <th style="width: 18%;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $index => $product)
                    <tr>
                        <td>{{ ($products->currentPage() - 1) * $products->perPage() + $index + 1 }}</td>
                        <td>
                            <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('images/default-image.png') }}" 
                                 alt="{{ $product->name }}" class="product-image" loading="lazy">
                        </td>
                        <td class="text-start">{{ $product->name }}</td>
                        <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                        <td>{{ $product->category->name ?? '-' }}</td>
                        <td class="actions">
                            <a href="{{ route('products.edit', $product->id) }}" class="flux-btn flux-btn-warning flux-btn-sm" title="Edit Product">Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="flux-btn flux-btn-danger flux-btn-sm" 
                                        onclick="return confirm('Are you sure you want to delete this product?')" title="Delete Product">
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

        <nav aria-label="Product pagination">
            {{ $products->links() }}
        </nav>
    </div>

</x-layouts.app>
