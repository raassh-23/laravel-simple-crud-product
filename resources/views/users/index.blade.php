@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1>Kelola User</h1>

            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th scope="col" class="text-center">Id</th>
                        <th scope="col" class="text-center">Nama</th>
                        <th scope="col" class="text-center">Alamat</th>
                        <th scope="col" class="text-center">Email</th>
                        <th scope="col" class="text-center">No Telpon</th>
                        <th scope="col" class="text-center">Role</th>
                        <th scope="col" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->address }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ Str::ucfirst($item->role) }}</td>
                            <td class="text-center">
                                <a href="{{ route('users.show', $item) }}" class="btn btn-primary">Detail</a>
                                <a href="{{ route('users.edit', $item) }}" class="btn btn-warning">Edit</a>
                                @if (Auth::user()->id != $item->id)
                                    <form action="{{ route('users.destroy', $item) }}" method="POST" class="d-inline">
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



            {{ $users->links() }}
        </div>
    </div>
@endsection
