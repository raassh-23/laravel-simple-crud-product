@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1 class="fw-bold">Selamat Datang</h1>
            @if (count($carouselItems) > 0)
                <div id="carousel" class="carousel slide bg-secondary rounded" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($carouselItems as $item)
                            <div class="{{ 'carousel-item ' . ($loop->first ? 'active' : '') }}"
                                style="width:100%; height: 400px !important;">
                                <img src="{{ asset($item->carousel_pict) }}" class="d-block mx-auto"
                                    style="height: 100%; width: auto;" alt="{{ $item->description }}">
                                <div class="carousel-caption d-none d-md-block ">
                                    <p class="fs-3 fw-semibold mb-0" style="text-shadow: 3px 3px 0px #000000;">
                                        {{ $item->name }}</p>
                                    <p class="fs-4" style="text-shadow: 3px 3px 0px #000000;">{{ $item->description }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            @endif

            <h2 class="mt-3 fw-bold">Daftar Produk</h2>
            <div class="row row-cols-2 row-cols-xs-2 row-cols-sm-4 row-cols-lg-6 g-3 mt-0">
                @foreach ($products as $product)
                    <div class="col mt-0 mb-3">
                        <div class="card h-100 d-flex flex-column">
                            <img class="card-img-top" src="{{ $product->product_pict }}" alt="{{ $product->name }}"
                                style="height: 200px; width: auto;">
                            <div class="card-body">
                                <a class="card-title fw-semibold fs-5 stretched-link m-0"
                                    href="#">{{ Str::limit($product->name, 30, '...') }}</a>
                                <p class="m-0">
                                    Rp. {{ $product->price }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{ $products->links() }}
        </div>
    </div>
@endsection
