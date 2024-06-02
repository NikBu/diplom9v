<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class AdminCategoryController extends Controller
{
    public function create()
    {
        $categories = Category::latest()->get();

        return view('admin.categories.category-create', compact('categories'));
   }

    public function store(Request $request)
    {    
         $category = Category::create([
            'name' => $request->category,
            'description' => $request->description
    ]);

    if($request->parent && $request->parent !== 'none') {
        //  Here we define the parent for new created category
        $node = Category::find($request->parent);

        $node->appendNode($category);
    }

    return redirect()->back();
   }


    public function index()
    {
        $categories = Category::withDepth()->with('ancestors')->get();

        return view('admin.categories.category-index', compact('categories'));
    }

    // public function show(Category $category)
    // {
    //     return view('admin.categories.category-show', compact('category'));
    // }
    
    public function edit(Category $category)
    {
        $categories = Category::latest()->get();
        return view('admin.categories.category-edit', compact('category', 'categories'));
    }

    public function update(Request $request, Category $category)
    {
        $category->update([
            'name' => $request->category,
            'description' => $request->description
        ]);
    
        if ($request->parent && $request->parent !== 'none') {
            // Find the new parent category
            $newParent = Category::find($request->parent);
    
            // Remove the category from its current parent
            $category->parent_id = null;
            $category->save();
    
            // Move the category under the new parent
            $newParent->appendNode($category);
        }
    
        return redirect()->route('categories.index');
    }
    
    public function destroy(Category $category)
    {
        $category->delete();
    
        return redirect()->route('categories.index');
    }
}