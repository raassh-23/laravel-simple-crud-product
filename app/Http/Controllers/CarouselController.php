<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carousels = Carousel::simplePaginate(5);

        return view('carousels.index', compact('carousels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('carousels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:4096',
        ]);

        $path = Storage::putFile('carousel-images', $request->file('image'));

        $carousel = Carousel::create([
            'name' => $request->name,
            'description' => $request->description,
            'carousel_pict' => $path,
        ]);

        if ($carousel) {
            return redirect()->route('carousels.index')->with('success', 'Carousel berhasil ditambahkan');
        } else {
            return redirect()->back()->with('error', 'Carousel gagal ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Carousel $carousel)
    {
        return view('carousels.show', compact('carousel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Carousel $carousel)
    {
        return view('carousels.edit', compact('carousel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Carousel $carousel)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:4096',
        ]);

        $path = $carousel->carousel_pict;

        if ($request->hasFile('image')) {
            Storage::delete($carousel->carousel_pict);
            $path = Storage::putFile('carousel-images', $request->file('image'));
        }

        $success = $carousel->update([
            'name' => $request->name,
            'description' => $request->description,
            'carousel_pict' => $path,
        ]);

        if ($success) {
            return redirect()->route('carousels.index')->with('success', 'Carousel berhasil diedit');
        } else {
            return redirect()->back()->with('error', 'Carousel gagal diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Carousel $carousel)
    {
        $carousel->delete();

        return redirect()->route('carousels.index')->with('success', 'Carousel berhasil dihapus');
    }
}
