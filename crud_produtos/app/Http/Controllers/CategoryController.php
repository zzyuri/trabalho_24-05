<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CategoryRequest;
use Redirect;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // SHOW JUST THE CATEGORIES THE USER INSERTED LATER

        $user = Auth::user();
        $categories = Category::where('user_id', $user->id)->get();

        return view('pages.categories.list', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {

        $messages = [
            'required' => 'The :attribute field is OBRIGATÓRIO.',
        ];

        $validator = Validator::make($request->all(), [
            $request->validated(),
        ], $messages);

        $category = Category::create(
            $request->validated()
        );

        return Redirect::route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('pages.categories.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updated = Category::where('id', $id)->update($request->except(['_token', '_method']));

        if ($updated) {
            return Redirect::route('categories.index');
        }

        return Redirect::back()->with('message', 'Error update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return Redirect::route('categories.index');
    }
}
