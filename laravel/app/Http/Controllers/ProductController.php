<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Get all products
    public function getProducts()
    {
        $products = Product::all();
        return response()->json([
            'message' => 'Get all products',
            'data' => $products
        ]);
    }

    public function createProduct(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category_id' => 'required|integer|exists:categories,id',
        ]);
        $product = Product::create($request->all());
        return response()->json($product, 201);
    }

    public function getProduct($id)
    {
        return Product::findOrFail($id);
    }

    public function updateProduct(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category_id' => 'required|integer|exists:categories,id',
        ]);
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return response()->json($product, 200);
    }

    public function deleteProduct($id)
    {
        Product::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
