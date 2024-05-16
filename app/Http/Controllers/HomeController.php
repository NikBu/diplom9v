<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\SpecialOffer;
use App\Models\Item;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Retrieve the top-level categories with their sub-categories
        $categories = Category::with('children')->whereNull('parent_id')->get();
        $newestNews = News::latest('published_at')->first();
        $newestSpecialOffer = SpecialOffer::latest('start_date')->first();
        return view('index', compact('categories','newestNews', 'newestSpecialOffer'));
    }
}