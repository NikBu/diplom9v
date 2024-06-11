<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item; // Assuming you have an Item model for items in the catalog
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        $categories = Category::with('children')->whereNull('parent_id')->get();

        // Perform the search query using the input query
        $results = Item::where('name', 'like', '%'.$query.'%')
                        ->orWhere('description', 'like', '%'.$query.'%')
                        ->paginate(20);
        
        return view('search.items-show', compact('categories', 'results', 'query'));
    }
}