@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="d-flex justify-content-between align-items-center p-0">
                <h1>Kelola Carousel</h1>
                <a href="{{ route('carousels.create') }}" class="btn btn-primary">Tambah Carousel</a>
            </div>

            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th scope="col" class="text-center">Id</th>
                        <th scope="col" class="text-center">Nama</th>
                        <th scope="col" class="text-center">Deskripsi</th>
                        <th scope="col" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($carousels as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->description }}</td>
                            <td class="text-center">
                                <a href="{{ route('carousels.show', $item) }}" class="btn btn-primary">Detail</a>
                                <a href="{{ route('carousels.edit', $item) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('carousels.destroy', $item) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Hapus</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>



            {{ $carousels->links() }}
        </div>
    </div>
@endsection
