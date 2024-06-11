<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\SpecialOffer;
use Illuminate\Http\Request;

class AdminSpecialOfferController extends Controller
{
    // Отображение списка всех специальных предложений
    public function index()
    {
        $specialOffers = SpecialOffer::all();
        return view('admin.offers.special-offer-index', compact('specialOffers'));
    }

    // Отображение формы создания специального предложения
    public function create()
    {
        $items = Item::all();
        return view('admin.offers.special-offer-create', compact('items'));
    }
    
    // Сохранение нового специального предложения
    public function store(Request $request)
    {
        $specialOffer = new SpecialOffer();
        $specialOffer->title = $request->input('title');
        $specialOffer->description = $request->input('description');
        $specialOffer->start_date = $request->input('start_date');
        $specialOffer->end_date = $request->input('end_date');
        $specialOffer->save();
    
        // Привязка выбранных товаров с их скидками
        foreach ($request->input('selected_items', []) as $itemId) {
            $specialOffer->items()->attach($itemId, ['discount_amount' => $request->input('discount_amount.'. $itemId)]);
        }
    
        return redirect()->back();
    }

    // Отображение формы редактирования специального предложения
    public function edit(SpecialOffer $offer)
    {
        $items = Item::all();
        return view('admin.offers.special-offer-edit', compact('offer', 'items'));
    }

    // Обновление информации о специальном предложении
    public function update(Request $request, SpecialOffer $offer)
    {
        $offer->title = $request->input('title');
        $offer->description = $request->input('description');
        $offer->start_date = $request->input('start_date');
        $offer->end_date = $request->input('end_date');
        $offer->save();

        // Синхронизация выбранных товаров с их скидками
        $selectedItems = $request->input('selected_items', []);
        $discountAmounts = $request->input('discount_amount', []);
        $itemsData = [];
        foreach ($selectedItems as $itemId) {
            $itemsData[$itemId] = ['discount_amount' => $discountAmounts[$itemId]?? 0];
        }
        $offer->items()->sync($itemsData);

        return redirect()->route('offers.index')->with('success', 'Специальное предложение успешно обновлено');
    }

    // Удаление специального предложения
    public function destroy(SpecialOffer $offer)
    {
        $offer->items()->detach(); // Отвязка связанных товаров
        $offer->delete(); // Удаление специального предложения
    
        return redirect()->route('offers.index')->with('success', 'Специальное предложение успешно удалено');
    }
}