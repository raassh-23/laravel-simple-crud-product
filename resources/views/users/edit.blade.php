@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1>Edit Profil</h1>

            <form action="{{ route('users.update', $user) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}"
                        required>
                    @error('name')
                        <div class="text-danger mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                @if (Auth::user()->id === $user->id)
                    <div class="mb-3">
                        <label for="password" class="form-label">Kata Sandi</label>
                        <input type="password" class="form-control" id="password" name="password">
                        @error('password')
                            <div class="text-danger mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                    </div>
                @endif
                <div class="mb-3">
                    <label for="address" class="form-label">Alamat</label>
                    <textarea class="form-control" id="address" name="address" rows="3" required>{{ $user->address }}</textarea>
                    @error('address')
                        <div class="text-danger mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">No Telpon</label>
                    <input type="number" class="form-control" id="phone" name="phone" value={{ $user->phone }}
                        required>
                    @error('phone')
                        <div class="text-danger mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Gambar Profil (Ukuran maks: 4 MB)</label>
                    <img src="{{ asset($user->profile_pic ? $user->profile_pic : 'default-profile-picture.png') }}"
                        alt="{{ $user->name }}" class="d-block" style="width: auto; height: 150px;">
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    @error('image')
                        <div class="text-danger mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                @if (Auth::user()->isAdmin)
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-select" id="role" name="role">
                            @foreach (App\Enums\UserRoleEnum::values() as $role)
                                <option value="{{ $role }}" {{ $user->role === $role ? 'selected' : '' }}>
                                    {{ Str::ucfirst($role) }}</option>
                            @endforeach
                        </select>
                        @error('role')
                            <div class="text-danger mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                @endif
                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </div>
    </div>
@endsection
