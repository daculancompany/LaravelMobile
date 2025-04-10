<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $query = Category::query();
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                  ->orWhere('description', 'like', "%$search%");
            });
        }
        

        $categories = $query->get();
        
        return response()->json($categories);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        $category = Category::create($validated);
        return response()->json($category, 201);
    }

    public function show(Category $category)
    {
        return response()->json($category);
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'description' => 'nullable|string'
        ]);

        $category->update($validated);
        return response()->json($category);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json(null, 204);
    }

    public function sampleQuery(Request $request)
    {
        $query = Category::get(); // all();
    //     $query = Category::latest()->get(); /// get latest
    //     $query = Category::orderBy("name","asc")->get(); // order by
    //     //SELECT * FROM `categories` INNER JOIN products ON categories.id = products.category_id
    //     $query = Category::with(['products'])->get(); 
    //     $query = Category::query()
    //     ->select('categories.*') 
    //     ->join('products',s 'categories.id', '=', 'products.category_id')
    //    // ->groupBy('categories.id')
    //     ->get(); 
        //sample products query
        // $query = Product::with(['category'])->get();
        // dd($query);
        return response()->json($query);
    }

    
}