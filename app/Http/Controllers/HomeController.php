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
    // Отображение главной страницы с категориями, последними новостями, последними специальными предложениями и разбивкой на страницы товаров
    public function index()
    {
        $categories = Category::with('children')->whereNull('parent_id')->get();
        $latestNews = News::latest()->take(6)->get();
        $latestSpecialOffers = SpecialOffer::latest()->take(6)->get();
    
        $items = Item::paginate(20); // Получение товаров с разбивкой на страницы
    
        return view('index', compact('categories', 'latestNews', 'latestSpecialOffers', 'items'));
    }

    // Отображение страницы "о нас" 
    public function about()
    {
        $categories = Category::with('children')->whereNull('parent_id')->get();
        return view('about', compact('categories'));
    }

    // Отображение страницы контакты 
    public function contacts()
    {
        $categories = Category::with('children')->whereNull('parent_id')->get();
        return view('contacts', compact('categories'));
    }

    // Отображение страницы вакансий 
    public function vacancies()
    {
        $categories = Category::with('children')->whereNull('parent_id')->get();
        return view('vacancies', compact('categories'));
    }



    // Отображение страницы ленты новостей  и разбивкой на страницы новостей
    public function showNews()
    {
        $categories = Category::with('children')->whereNull('parent_id')->get();
        $news = News::paginate(20);
        return view('news.index', compact('categories','news'));
    }

    // Отображение страницы одной новости 
    public function showNewsItem($id)
    {
        $categories = Category::with('children')->whereNull('parent_id')->get();
        $news = News::findOrFail($id);
        return view('news.show', compact('categories','news'));
    }

    // Отображение страницы ленты специальных предложений  и разбивкой на страницы специальных предложений
    public function showSpecialOffers()
    {
        $categories = Category::with('children')->whereNull('parent_id')->get();
        $specialOffers = SpecialOffer::paginate(20);
        return view('special-offers.index', compact('categories','specialOffers'));
    }

    // Отображение страницы одного специального предложения 
    public function showSpecialOffersItem($id)
    {
        $categories = Category::with('children')->whereNull('parent_id')->get();
        $specialOffer = SpecialOffer::findOrFail($id);
        return view('special-offers.show', compact('categories','specialOffer'));
    }


    // Отображение страницы одного товара  и изображениями
    public function showItem($itemId)
    {
        $categories = Category::with('children')->whereNull('parent_id')->get();
        $item = Item::with('categories', 'images')->findOrFail($itemId);
        return view('items.show', compact('categories','item'));
    }

    // Отображение страницы одной категории , текущей категорией и разбивкой на страницы товаров
    public function showCategory($categoryId)
    {
        $categories = Category::with('children')->whereNull('parent_id')->get();
        $currentCategory = Category::find($categoryId);
        
        if (!$currentCategory) {
            abort(404); // Обработка случая, когда категория не найдена
        }
        
        // Получение товаров из текущей категории и ее подкатегорий
        $categoryIds = $currentCategory->descendants()->pluck('id')->prepend($currentCategory->id);
        $items = Item::whereHas('categories', function ($query) use ($categoryIds) {
            $query->whereIn('category_id', $categoryIds);
        })->paginate(20);

        return view('categories.show', compact('categories', 'currentCategory', 'items'));
    }
}