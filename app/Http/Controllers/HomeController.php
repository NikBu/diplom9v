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
    public function about()
    {
        $categories = Category::with('children')->whereNull('parent_id')->get();
        return view('about', compact('categories'));
    }
    public function contacts()
    {
        $categories = Category::with('children')->whereNull('parent_id')->get();
        return view('contacts', compact('categories'));
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

    public function showItem($itemId)
    {
        $categories = Category::with('children')->whereNull('parent_id')->get();
        $item = Item::with('categories', 'images')->findOrFail($itemId);
        return view('items.show', compact('categories','item'));
    }

    public function showCategory($categoryId)
    {
        $categories = Category::with('children')->whereNull('parent_id')->get();
        $currentCategory = Category::find($categoryId);
        
        if (!$currentCategory) {
            abort(404); // Handle the case where the category is not found
        }
        
        // Retrieve items from the current category and its descendant categories
        $categoryIds = $currentCategory->descendants()->pluck('id')->prepend($currentCategory->id);
        $items = Item::whereHas('categories', function ($query) use ($categoryIds) {
            $query->whereIn('category_id', $categoryIds);
        })->paginate(20);

        return view('categories.show', compact('categories', 'currentCategory', 'items'));
    }
}