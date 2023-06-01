@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1 class="fw-bold">Selamat Datang</h1>
            @if (count($carouselItems) > 0)
                <div id="carousel" class="carousel slide bg-secondary rounded" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($carouselItems as $item)
                            <div class="{{ 'carousel-item ' . ($loop->first ? 'active' : '') }}" style="width:100%; height: 400px !important;">
                                <img src="{{ $item->carousel_pict }}" class="d-block mx-auto" style="height: 100%; width: auto;"
                                    alt="{{ $item->description }}">
                                <div class="carousel-caption d-none d-md-block ">
                                    <h5 class="fw-bold text-body">{{ $item->name }}</h5>
                                    <p class="fs-4 text-body">{{ $item->description }}</p>
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


        </div>
    </div>
@endsection
