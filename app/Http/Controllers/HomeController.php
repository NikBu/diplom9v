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
    
        // Retrieve the latest news and special offer
        $newestNews = News::latest('published_at')->first();
        $newestSpecialOffer = SpecialOffer::latest('start_date')->first();
    
        // Retrieve 3-7 previous news and special offers (titles only)
        $previousNews = News::where('id', '!=', $newestNews->id)->latest()->take(6)->get();
        $previousOffers = SpecialOffer::where('id', '!=', $newestSpecialOffer->id)->latest()->take(6)->get();
    
        return view('index', compact('categories', 'newestNews', 'newestSpecialOffer', 'previousNews', 'previousOffers'));
    }
}