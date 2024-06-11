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
    // Отображение формы создания товара
    public function create()
    {
        $categories = Category::all(); 
        return view('admin.items.item-create', compact('categories'));
    }

    // Сохранение нового товара
    public function store(Request $request)
    {    
        $item = Item::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity
        ]);

        // Привязка выбранных категорий к товару
        $item->categories()->attach($request->categories);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $imagePath = $file->store('images', 'public');
                $image = new Image([
                    'url' => $imagePath,
                    'item_id' => $item->id
                ]);
                $image->save();
            }
        }

        return redirect()->back();
    }

    // Отображение списка всех товаров
    public function index()
    {
        $items = Item::with('categories', 'images')->get();
        $categories = Category::all();
        return view('admin.items.item-index', compact('items', 'categories'));
    }

    // Отображение подробной информации о товаре
    // public function show(Item $item)
    // {
    //     return view('admin.item-show', compact('item'));
    // }

    // Отображение формы редактирования товара
    public function edit(Item $item)
    {
        $categories = Category::all();
        return view('admin.items.item-edit', compact('item', 'categories'));
    }

    // Обновление информации о товаре
    public function update(Request $request, Item $item)
    {
        $item->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity
        ]);
    
        // Синхронизация выбранных категорий с товаром
        $item->categories()->sync($request->categories);
    
        // Удаление выбранных изображений
        if ($request->has('images_to_delete')) {
            foreach ($request->images_to_delete as $imageId) {
                $image = Image::find($imageId);
                Storage::disk('public')->delete($image->url);
                $image->delete();
            }
        }
    
        // Обработка новых изображений
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

    // Удаление товара
    public function destroy(Item $item)
    {
        // Удаление товара
        $item->delete();

        // Удаление связанных изображений
        foreach ($item->images as $image) {
            Storage::disk('public')->delete($image->url);
            $image->delete();
        }

        return redirect()->route('items.index')->with('success', 'Товар успешно удален');
    }
}