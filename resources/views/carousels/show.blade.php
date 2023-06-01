@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="d-flex justify-content-between align-items-center p-0">
                <h1>{{ $carousel->name }}</h1>
                <div>
                    <a href="{{ route('carousels.edit', $carousel) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('carousels.destroy', $carousel) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <img src="{{ asset($carousel->carousel_pict) }}" alt="{{ $carousel->name }}"
                    class="d-block" style="width: auto; height: 300px;">
            </div>

            <h3 class="mt-3">Deskripsi</h3>
            <p>{{ $carousel->description }}</p>

            
        </div>
    </div>
@endsection
