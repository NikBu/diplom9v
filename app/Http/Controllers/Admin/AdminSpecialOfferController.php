<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\SpecialOffer;
use Illuminate\Http\Request;

class AdminSpecialOfferController extends Controller
{
    public function index()
    {
        $specialOffers = SpecialOffer::all();
        return view('admin.offers.special-offer-index', compact('specialOffers'));
    }

    public function create()
    {
        $items = Item::all();
        return view('admin.offers.special-offer-create', compact('items'));
    }

    public function store(Request $request)
    {
        $specialOffer = new SpecialOffer();
        $specialOffer->title = $request->input('title');
        $specialOffer->description = $request->input('description');
        $specialOffer->start_date = $request->input('start_date');
        $specialOffer->end_date = $request->input('end_date');
        $specialOffer->save();
    
        $specialOffer->items()->attach($request->input('items'), ['discount_amount' => $request->input('discount_amount')]);
            
        return redirect()->back();
    }
    public function edit(SpecialOffer $offer)
    {
        $items = Item::all();
        return view('admin.offers.special-offer-edit', compact('offer', 'items'));
    }

    public function update(Request $request, SpecialOffer $offer)
    {
        $offer->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
        ]);

        $offer->items()->sync($request->input('items'), ['discount_amount' => $request->input('discount_amount')]);

        return redirect()->route('offers.index')->with('success', 'Special Offer deleted successfully');
    }
    public function destroy(SpecialOffer $offer)
    {
        $offer->items()->detach(); // Detach associated items
        $offer->delete(); // Delete the special offer
    
        return redirect()->route('offers.index')->with('success', 'Special Offer deleted successfully');
    }
}