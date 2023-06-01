@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1>Dashboard</h1>

            <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-3 g-3">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h4 class="card-title fw-bold">Produk</h4>
                                    <a href="{{ route("products.index") }}" class="btn btn-primary">Kelola</a>
                                </div>
                                <div>
                                    <i class="fa-solid fa-tag fa-4x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @if (Auth::user()->isAdmin)
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h4 class="card-title fw-bold">Carousel</h4>
                                        <a href="{{ route("carousels.index") }}" class="btn btn-primary">Kelola</a>
                                    </div>
                                    <div>
                                        <i class="fa-solid fa-images fa-4x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h4 class="card-title fw-bold">User</h4>
                                        <a href="#" class="btn btn-primary">Kelola</a>
                                    </div>
                                    <div>
                                        <i class="fa-solid fa-user fa-4x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
