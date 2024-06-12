<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Item;
use App\Models\User;
use App\Models\Category;

class OrderController extends Controller
{
    public function index()
    {
        $categories = Category::with('children')->whereNull('parent_id')->get();
        $user = auth()->user();
        $orders = Order::with('orderItems.item')->where('user_id', $user->id)->get();
        return view('orders', compact('orders', 'categories'));
    }

    public function addItemToOrder(Request $request)
    {
        $latestOrder = Order::where('user_id', auth()->id())->latest()->first();

        if (!$latestOrder || $latestOrder->status !== 'Корзина') {
            // Create a new order if there is no 'shopping cart' order
            $latestOrder = Order::create([
                'user_id' => auth()->id(),
                'order_date' => now(),
                'total_amount' => 0,
                'status' => 'Корзина',
            ]);
        }

        $item = Item::find($request->item_id);
        $existingOrderItem = $latestOrder->orderItems()->where('item_id', $item->id)->first();
    
        if ($existingOrderItem) {
            // If the item already exists in the order, update the quantity
            $existingOrderItem->quantity += $request->quantity;
            $existingOrderItem->save();
        } else {
            // Create a new OrderItem if the item is not already in the order
            $orderItem = new OrderItem([
                'order_id' => $latestOrder->id,
                'item_id' => $item->id,
                'quantity' => $request->quantity,
                'price' => $item->price,
            ]);
            $orderItem->save();
        }
        
        // Update the total amount in the order
        $latestOrder->total_amount += $request->quantity * $item->price;
        $latestOrder->save();
        
        return redirect()->back()->with('success', 'Item added to order successfully');
    }

    public function completeOrder($id)
    {
        $order = Order::findOrFail($id);

        if ($order->status === 'Корзина') {
            // Update the order status to 'completed' if it's still in the 'Корзина' status
            $order->status = 'completed';
            $order->save();

            return redirect()->route('orders.index')->with('success', 'Order completed successfully');
        }

        return redirect()->route('orders.index')->with('error', 'Order cannot be completed');
    }
}
