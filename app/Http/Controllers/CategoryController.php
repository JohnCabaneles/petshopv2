<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('created_at', 'asc')->paginate(10);

        return view('adminCategories.index', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required|unique:categories'
        ]);

        $formFields['user_id'] = auth()->id();

        Category::create($formFields);

        return back()->with('success', 'Category added succesfully!');

    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return back()->with('message', 'Category deleted successfully!');

    }




}
