<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $products = Product::all();
        $users = User::all();
        return view('pages.products.list', ['products' => $products, 'users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {

        // dd($request);
        // $request->validate([
        // 'name' => ['required', 'string', 'max:80'],
        // 'description' => ['required', 'string'],
        // 'price' => ['required', 'decimal:2'],
        // 'quantity' => ['required', 'integer'],
        // ]);
        //
        // dd($request->validated());
        $product = Product::create(
            $request->validated()
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('pages.products.show', ['products' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        // return var_dump($product);
        // return view('pages.products.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }

}
