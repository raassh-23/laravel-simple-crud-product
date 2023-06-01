<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    function index() {
        $carouselItems = Carousel::all();

        return view('landing-page', compact('carouselItems'));
    }
}
