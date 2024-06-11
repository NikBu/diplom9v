<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class AdminCategoryController extends Controller
{
    // Отображение формы создания категории
    public function create()
    {
        $categories = Category::latest()->get();

        return view('admin.categories.category-create', compact('categories'));
    }

    // Сохранение новой категории
    public function store(Request $request)
    {
        $category = Category::create([
            'name' => $request->category,
            'description' => $request->description
        ]);

        // Если выбран родительский узел, добавляем категорию в него
        if ($request->parent && $request->parent!== 'none') {
            $node = Category::find($request->parent);
            $node->appendNode($category);
        }

        return redirect()->back();
    }

    // Отображение списка всех категорий
    public function index()
    {
        $categories = Category::withDepth()->with('ancestors')->get();

        return view('admin.categories.category-index', compact('categories'));
    }

    // Отображение подробной информации о категории
    // public function show(Category $category)
    // {
    //     return view('admin.categories.category-show', compact('category'));
    // }

    // Отображение формы редактирования категории
    public function edit(Category $category)
    {
        $categories = Category::latest()->get();
        return view('admin.categories.category-edit', compact('category', 'categories'));
    }

    // Обновление информации о категории
    public function update(Request $request, Category $category)
    {
        $category->update([
            'name' => $request->category,
            'description' => $request->description
        ]);

        // Если выбран родительский узел, перемещаем категорию в него
        if ($request->parent && $request->parent!== 'none') {
            $newParent = Category::find($request->parent);

            // Удаляем категорию из текущего родительского узла
            $category->parent_id = null;
            $category->save();

            // Добавляем категорию в новый родительский узел
            $newParent->appendNode($category);
        }

        return redirect()->route('categories.index');
    }

    // Удаление категории
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index');
    }
}