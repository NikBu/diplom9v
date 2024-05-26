<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\SpecialOffer;
use App\Models\Item;
use App\Models\Image;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::with('children')->whereNull('parent_id')->get();
        $latestNews = News::latest()->take(6)->get();
        $latestSpecialOffers = SpecialOffer::latest()->take(6)->get();
    
        $items = Item::paginate(20); // Fetch items with pagination
    
        return view('index', compact('categories', 'latestNews', 'latestSpecialOffers', 'items'));
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

    public function showItem(Item $item)
    {
        return view('items.show', compact('item'));
    }
}