<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // 1. Retrieve all categories
    public function index()
    {
        return response()->json(Category::all(), 200);
    }

    // 2. Create a new category
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = Category::create($validated);

        return response()->json($category, 201);
    }

    // 3. Retrieve details of a single category
    public function show(Category $category)
    {
        return response()->json($category, 200);
    }

    // 4. Update an existing category
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
        ]);

        $category->update($validated);

        return response()->json($category, 200);
    }

    // 5. Delete a category
    public function destroy(Category $category)
    {
        $category->delete();

        return response()->json(['message' => 'Category deleted successfully'], 200);
    }

    // 6. Get all categories associated with a product
    public function getCategoriesByProduct(Product $product)
    {
        // Leveraging the relationship defined in the Product model
        return response()->json($product->categories, 200);
    }
}
