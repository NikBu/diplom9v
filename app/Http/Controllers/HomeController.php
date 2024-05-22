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
    
        // Retrieve 3-7 previous news and special offers (titles only)
        $latestNews = News::latest()->take(6)->get();
        $latestSpecialOffers = SpecialOffer::latest()->take(6)->get();
    
        return view('index', compact('categories', 'latestNews', 'latestSpecialOffers'));
    }

    // feed
    public function showNews()
    {
        $news = News::latest()->get();
        return view('news.index', compact('news'));
    }
    public function showNewsItem($id)
    {
        $news = News::findOrFail($id);
        return view('news.show', compact('news'));
    }
    public function showSpecialOffers()
    {
        $specialOffers = SpecialOffer::latest()->get();
        return view('special-offers.index', compact('specialOffers'));
    }
    public function showSpecialOffersItem($id)
    {
        $specialOffer = SpecialOffer::findOrFail($id);
        return view('special-offers.show', compact('specialOffer'));
    }
}