@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="d-flex justify-content-between align-items-center p-0">
                <h1>Profil</h1>
                <div>
                    <a href="{{ route('users.edit', $user) }}" class="btn btn-warning">Edit</a>
                    @if (Auth::user()->isAdmin && Auth::user()->id != $user->id)
                        <form action="{{ route('users.destroy', $user) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Hapus</button>
                        </form>
                    @endif
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <img src="{{ asset($user->profile_pict ? $user->profile_pict : 'default-profile-picture.png') }}"
                    alt="{{ $user->name }}" class="d-block" style="width: auto; height: 300px;">
            </div>

            <h3 class="mt-3">Nama</h3>
            <p>{{ $user->name }}</p>

            <h3>Email</h3>
            <p>{{ $user->email }}</p>

            <h3>Alamat</h3>
            <p>{{ $user->address }}</p>

            <h3>No Telpon</h3>
            <p>{{ $user->phone }}</p>


        </div>
    </div>
@endsection
