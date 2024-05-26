<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public readonly Product $product;
    public readonly User $user;

    public function __construct()
    {
        $this->product = new Product();
        $this->user = new User();
    }

    // INDEX
    public function index()
    {
        $products = $this->product->all();
        $users = $this->product->all();
        // $products = Product::all();
        // $users = User::all();
        return view('pages.products.list', ['products' => $products, 'users' => $users]);
    }

    // CREATE
    public function create()
    {
        return view('pages.products.create');
    }

    // STORE
    public function store(ProductRequest $request)
    {
        $product = Product::create(
            $request->validated()
        );

        return redirect()->route('products.index');
    }

    // SHOW
    public function show(string $id)
    {
    }

    // EDIT
    public function edit(Product $product)
    {
        return view('pages.products.edit', ['product' => $product]);
    }

    // UPDATE
    public function update(Request $request, string $id)
    {
        $updated = $this->product->where('id', $id)->update($request->except(['_token', '_method']));

        if ($updated) {
            return redirect()->route('products.index');
        }

        return redirect()->back()->with('message', 'Error update');
    }

    // DESTROY
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index');
    }

}
