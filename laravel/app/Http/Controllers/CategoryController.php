<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function getCategories()
    {
        $categories = Category::all();
        return response()->json([
            'message' => 'Get all categories',
            'data' => $categories
        ]);
    }

    public function createCategory(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $category = Category::create($validatedData);
        return response()->json($category, 201);
    }

    public function getCategory($id)
    {
        return Category::findOrFail($id);
    }

    public function updateCategory(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $category = Category::findOrFail($id);
        $category->update($validatedData);
        return response()->json($category, 200);
    }

    public function deleteCategory($id)
    {
        Category::findOrFail($id)->delete();
        return response()->json(null, 204);
    }

    public function getCategoryProducts($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        return $category->products;
    }
}