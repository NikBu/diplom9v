<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;

class AdminItemController extends Controller
{
    public function create()
    {
        $categories = Category::all(); 
        // Logic for retrieving any necessary data goes here
        return view('admin.items.item-create', compact('categories'));
    }

    public function store(Request $request)
{    
        $item = Item::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity
        ]);

        // Attach selected categories to the item
        $item->categories()->attach($request->categories);

        return redirect()->back();
}

    public function index()
    {
        $items = Item::all();
        $categories = Category::all();
        return view('admin.items.item-index', compact('items', 'categories'));
    }

    // public function show(Item $item)
    // {
    //     return view('admin.item-show', compact('item'));
    // }

    // public function edit(Item $item)
    // {
    //     return view('admin.item-edit', compact('item'));
    // }

    public function update(Request $request, Item $item)
    {
        $item->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price
        ]);

        $item->categories()->attach($request->categories);

        return redirect()->back();
    }

    public function destroy(Item $item)
    {
        $item->delete();

        return redirect()->route('admin.items.item-index');
    }
}