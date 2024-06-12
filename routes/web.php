<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\OrderController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contacts', [HomeController::class, 'contacts'])->name('contacts');
Route::get('/vacancies', [HomeController::class, 'vacancies'])->name('vacancies');


Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::get('/news', [HomeController::class, 'showNews'])->name('main.news.index');
Route::get('/news/{id}', [HomeController::class, 'showNewsItem'])->name('main.news.show');
Route::get('/special-offers', [HomeController::class, 'showSpecialOffers'])->name('main.special_offers.index');
Route::get('/special-offers/{id}', [HomeController::class, 'showSpecialOffersItem'])->name('main.special-offers.show');
Route::get('/items/{itemID}', [HomeController::class, 'showItem'])->name('main.item.show');
Route::get('/categories/{categoryId}', [HomeController::class, 'showCategory'])->name('main.categories.show');

Route::post('/add-item-to-order', [OrderController::class, 'addItemToOrder'])->name('add.item.to.order');
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// Admin routes
Route::prefix('admin')->middleware('admin')->group(function () {
    Route::resource('/categories', '\App\Http\Controllers\Admin\AdminCategoryController');
    Route::resource('/items', '\App\Http\Controllers\Admin\AdminItemController');
    Route::resource('/news', '\App\Http\Controllers\Admin\AdminNewsController');
    Route::resource('/offers', '\App\Http\Controllers\Admin\AdminSpecialOfferController');
    Route::resource('/orders', '\App\Http\Controllers\Admin\AdminOrderController');
    Route::get('/', function () {
        return view('admin.admin-index');
    });
});