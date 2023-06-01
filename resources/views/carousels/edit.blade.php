@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1>Edit Carousel</h1>
            <form action="{{ route('carousels.update', $carousel) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Carousel</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $carousel->name }}"
                        required>
                    @error('name')
                        <div class="text-danger mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi Carousel</label>
                    <textarea class="form-control" id="description" name="description"
                        rows="3" required>{{ $carousel->description }}</textarea>
                    @error('description')
                        <div class="text-danger mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Gambar Carousel (Ukuran maks: 4 MB)</label>
                    <img src="{{ asset($carousel->carousel_pict) }}" alt="{{ $carousel->name }}"
                        class="d-block" style="width: auto; height: 150px;">
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    @error('image')
                        <div class="text-danger mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </div>
    </div>
@endsection
