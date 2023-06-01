@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="d-flex justify-content-between align-items-center p-0">
                <h1>{{ $product->name }}</h1>
                @if (Auth::check() && Auth::user()->isAdmin)
                    <div>
                        <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Hapus</button>
                        </form>
                    </div>
                @endif
            </div>

            <div class="d-flex justify-content-center">
                <img src="{{ asset($product->product_pict) }}" alt="{{ $product->name }}" class="d-block"
                    style="width: auto; height: 300px;">
            </div>

            <h3 class="mt-3">Deskripsi</h3>
            <p>{{ $product->description }}</p>

            <h3 class="mt-3">Harga</h3>
            <p>Rp. {{ $product->price }}</p>


        </div>
    </div>
@endsection
