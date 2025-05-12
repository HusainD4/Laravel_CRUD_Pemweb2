@extends('layouts.app')

@section('title', 'Keranjang Belanja')

@section('content')
<div class="container">
    <h2 class="my-4">Keranjang Belanja</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (count($cart) > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cart as $id => $item)
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>Rp {{ number_format($item['price'], 0, ',', '.') }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('cart.remove', $id) }}" class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('cart.clear') }}" class="btn btn-warning">Kosongkan Keranjang</a>
    @else
        <p>Keranjang Anda kosong.</p>
    @endif
</div>
@endsection
