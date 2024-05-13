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

    public readonly Product $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    public function index()
    {
        // $products = $this->product->all();
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
        $product = Product::create(
            $request->validated()
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return var_dump($this->product->where('id', $id));
        // return view('pages.products.show', ['products' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('pages.products.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updated = $this->product->where('id', $id)->update($request->except(['_token', '_method']));

        if ($updated) {
            return redirect()->back()->with('message', 'Successfully updated');
        }

        return redirect()->back()->with('message', 'Error update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->user->where('id', $id)->delete();

        return redirect()->route('products.index');
    }

}
