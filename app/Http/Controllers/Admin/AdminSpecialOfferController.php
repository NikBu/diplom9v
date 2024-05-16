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
}