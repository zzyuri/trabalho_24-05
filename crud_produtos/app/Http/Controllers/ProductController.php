<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Redirect;

class ProductController extends Controller
{
    // INDEX
    public function index()
    {
        $products = Product::all();
        $users = User::all();

        return view('pages.products.list', ['products' => $products, 'users' => $users]);
    }

    public function create()
    {
        return view('pages.products.create');
    }

    public function store(ProductRequest $request)
    {
        $product = Product::create(
            $request->validated()
        );

        return Redirect::route('products.index');
    }

    public function show(string $id)
    {
        // Não julguei necessário fazer este setor para esse trabalho CRUD;
    }

    public function edit(Product $product)
    {
        return view('pages.products.edit', ['product' => $product]);
    }

    public function update(Request $request, string $id)
    {
        $updated = Product::where('id', $id)->update($request->except(['_token', '_method']));

        if ($updated) {
            return Redirect::route('products.index');
        }

        return redirect()->back()->with('message', 'Error update');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index');
    }

}
