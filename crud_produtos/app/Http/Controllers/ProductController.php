<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\ProductRequest;
use Redirect;

class ProductController extends Controller
{
    // INDEX
    public function index()
    {
        $user = Auth::user();
        $products = Product::where('user_id', $user->id)->get();
        $categories = Category::where('user_id', $user->id)->get();

        return view('pages.products.list', ['products' => $products, 'categories' => $categories]);
    }

    public function create()
    {
        $user = Auth::user();
        $categories = Category::where('user_id', $user->id)->get();
        return view('pages.products.create', ['categories' => $categories]);
    }

    public function store(ProductRequest $request)
    {
        $messages = [
            'required' => 'The :attribute field is OBRIGATÓRIO.',
        ];

        $validator = Validator::make($request->all(), [
            $request->validated(),
        ], $messages);

        if ($validator->fails()) {
            return Redirect::route('products.create')
                        ->withErrors($validator)
                        ->withInput();
        }

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
        $user = Auth::user();
        $categories = Category::where('user_id', $user->id)->get();
        return view('pages.products.edit', ['product' => $product, 'categories' => $categories]);
    }

    public function update(Request $request, string $id)
    {
        $updated = Product::where('id', $id)->update($request->except(['_token', '_method']));

        if ($updated) {
            return Redirect::route('products.index');
        }

        return Redirect::back()->with('message', 'Error update');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return Redirect::route('products.index');
    }

}
