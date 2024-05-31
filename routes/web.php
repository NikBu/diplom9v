<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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


Route::get('/news', [HomeController::class, 'showNews'])->name('news');
Route::get('/news/{id}', [HomeController::class, 'showNewsItem'])->name('news.show');
Route::get('/special-offers', [HomeController::class, 'showSpecialOffers'])->name('special_offers');
Route::get('/special-offers/{id}', [HomeController::class, 'showSpecialOffersItem'])->name('special-offers.show');
Route::get('/items/{itemID}', [HomeController::class, 'showItem']);
Route::get('/categories/{categoryId}', [HomeController::class, 'showCategory']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
// Admin routes
Route::prefix('admin')->group(function () {
    Route::resource('/categories', '\App\Http\Controllers\Admin\AdminCategoryController');
    Route::resource('/items', '\App\Http\Controllers\Admin\AdminItemController');
    Route::resource('/news', '\App\Http\Controllers\Admin\AdminNewsController');
    Route::resource('/offers', '\App\Http\Controllers\Admin\AdminSpecialOfferController');
    Route::get('/', function () {
        return view('admin.admin-index');
    });
});
