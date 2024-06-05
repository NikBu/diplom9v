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
    public function vacancies()
    {
        $categories = Category::with('children')->whereNull('parent_id')->get();
        return view('vacancies', compact('categories'));
    }



    // feed
    public function showNews()
    {
        $categories = Category::with('children')->whereNull('parent_id')->get();
        $news = News::paginate(20);
        return view('news.index', compact('categories','news'));
    }
    public function showNewsItem($id)
    {
        $categories = Category::with('children')->whereNull('parent_id')->get();
        $news = News::findOrFail($id);
        return view('news.show', compact('categories','news'));
    }
    public function showSpecialOffers()
    {
        $categories = Category::with('children')->whereNull('parent_id')->get();
        $specialOffers = SpecialOffer::paginate(20);
        return view('special-offers.index', compact('categories','specialOffers'));
    }
    public function showSpecialOffersItem($id)
    {
        $categories = Category::with('children')->whereNull('parent_id')->get();
        $specialOffer = SpecialOffer::findOrFail($id);
        return view('special-offers.show', compact('categories','specialOffer'));
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