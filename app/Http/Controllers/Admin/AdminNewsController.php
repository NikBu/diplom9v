<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;

class AdminNewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        return view('admin.news.news-index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.news-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'published_at' => 'required|date'
        ]);

        News::create($request->all());

        return redirect()->route('admin.news.news-index')->with('success', 'News article created successfully');
    }

    // public function edit(News $news)
    // {
    //     return view('admin.news.edit', compact('news'));
    // }

//     public function update(Request $request, News $news)
//     {
//         $request->validate([
//             'title' => 'required',
//             'content' => 'required',
//             'published_at' => 'required|date'
//         ]);

//         $news->update($request->all());

//         return redirect()->route('news.index')->with('success', 'News article updated successfully');
//     }

    public function destroy(News $news)
    {
        $news->delete();

        return redirect()->route('news.news.news-')->with('success', 'News article deleted successfully');
    }
}