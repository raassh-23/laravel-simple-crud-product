<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::simplePaginate(5);

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:4096',
        ]);

        $path = Storage::putFile('product-images', $request->file('image'));

        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'product_pict' => $path,
            'price' => $request->price,
        ]);

        if ($product) {
            return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan');
        } else {
            return redirect()->back()->with('error', 'Produk gagal ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:4096',
        ]);

        $path = $product->product_pict;

        if ($request->hasFile('image')) {
            Storage::delete($product->product_pict);
            $path = Storage::putFile('product-images', $request->file('image'));
        }

        $success = $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'product_pict' => $path,
            'price' => $request->price,
        ]);

        if ($success) {
            return redirect()->route('products.index')->with('success', 'Produk berhasil diupdate');
        } else {
            return redirect()->back()->with('error', 'Produk gagal diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus');
    }
}
