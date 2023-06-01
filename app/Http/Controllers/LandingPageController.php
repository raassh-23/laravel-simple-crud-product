<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\Product;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    function index() {
        $carouselItems = Carousel::all();
        $products = Product::simplePaginate(12);

        return view('landing-page', compact('carouselItems', 'products'));
    }
}
