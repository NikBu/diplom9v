<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class AdminItemController extends Controller
{
    public function create()
    {
        $categories = Category::all(); 
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

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $image = new Image([
                'url' => $imagePath,
                'item_id' => $item->id
            ]);
            $image->save();
        }

        return redirect()->back();
    }

    public function index()
    {
        $items = Item::with('categories', 'images')->get();
        $categories = Category::all();
        return view('admin.items.item-index', compact('items', 'categories'));
    }
    // public function show(Item $item)
    // {
    //     return view('admin.item-show', compact('item'));
    // }

    public function edit(Item $item)
    {
        $categories = Category::all();
        return view('admin.items.item-edit', compact('item', 'categories'));
    }

    public function update(Request $request, Item $item)
    {
        $item->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity
        ]);
    
        // Sync the selected categories with the item
        $item->categories()->sync($request->categories);
    
        // Delete selected images
        if ($request->has('images_to_delete')) {
            foreach ($request->images_to_delete as $imageId) {
                $image = Image::find($imageId);
                Storage::disk('public')->delete($image->url);
                $image->delete();
            }
        }
    
        // Handle new image uploads
        if ($request->hasFile('new_images')) {
            foreach ($request->file('new_images') as $file) {
                $imagePath = $file->store('images', 'public');
                $image = new Image([
                    'url' => $imagePath,
                    'item_id' => $item->id
                ]);
                $image->save();
            }
        }
    
        return redirect()->route('items.index');
    }

    public function destroy(Item $item)
    {
        // Delete the item
        $item->delete();

        // Delete associated images
        foreach ($item->images as $image) {
            Storage::disk('public')->delete($image->url);
            $image->delete();
        }

        return redirect()->route('items.index')->with('success', 'Item deleted successfully');
    }
}