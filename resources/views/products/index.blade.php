@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="d-flex justify-content-between align-items-center p-0">
                <h1>Kelola Produk</h1>

                @if (Auth::user()->isAdmin)
                    <a href="{{ route('products.create') }}" class="btn btn-primary">Tambah Produk</a>
                @endif
            </div>

            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th scope="col" class="text-center">Id</th>
                        <th scope="col" class="text-center">Nama</th>
                        <th scope="col" class="text-center">Deskripsi</th>
                        <th scope="col" class="text-center">Harga</th>
                        <th scope="col" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->price }}</td>
                            <td class="text-center">
                                <a href="{{ route('products.show', $item) }}" class="btn btn-primary">Detail</a>
                                @if (Auth::user()->isAdmin)
                                    <a href="{{ route('products.edit', $item) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('products.destroy', $item) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">Hapus</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $products->links() }}
        </div>
    </div>
@endsection
