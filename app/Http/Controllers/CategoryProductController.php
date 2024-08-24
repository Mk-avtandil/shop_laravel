<?php

namespace App\Http\Controllers;
use App\Http\Requests\SaveCategoryRequest;
use Illuminate\Contracts\View\View;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;

class CategoryProductController extends Controller
{
    public function index() : View
    {
        $categories = Category::paginate(5);
        return view('category.index', ['categories' => $categories]);
    }

    public function create() : View
    {
        $categories = Category::all();
        return view('category.create', ['categories' => $categories]);
    }

    public function save(SaveCategoryRequest $request) : RedirectResponse
    {
        Category::create([
            'name' => $request->get('name'),
        ]);
        return redirect()->back();
    }

    public function delete(Category $category) : RedirectResponse
    {
        $category->delete();
        return redirect()->back();
    }

    public function edit($id) : View
    {
        $category = Category::findOrFail($id);
        return view('category.edit', ['category' => $category]);
    }

    public function update($id, SaveCategoryRequest $request) : RedirectResponse
    {
        $category = Category::findOrFail($id);
        $category->update($request->validated());
        return redirect()->back();
    }
}
