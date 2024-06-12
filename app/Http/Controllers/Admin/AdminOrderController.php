<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Item;

class AdminOrderController extends Controller
{
    // Отображение списка всех заказов
    public function index()
    {
        $orders = Order::all();
        return view('admin.orders.order-index', compact('orders'));
    }

    // // Отображение формы создания заказа
    // public function create()
    // {
    //     $items = Item::all();
    //     return view('admin.orders.order-create', compact('items'));
    // }

    // // Сохранение нового заказа
    // public function store(Request $request)
    // {
    //     $order = new Order();
    //     $order->user_id = $request->input('user_id');
    //     $order->order_date = $request->input('order_date');
    //     $order->total_amount = $request->input('total_amount');
    //     $order->save();

    //     // Привязка выбранных продуктов с их количеством
    //     foreach ($request->input('selected_items', []) as $itemId) {
    //         $order->items()->attach($itemId, ['quantity' => $request->input('quantity.'. $itemId)]);
    //     }

    //     return redirect()->back();
    // }

    // Отображение формы редактирования заказа
    public function edit(Order $order)
    {
        $items = Item::all();
        return view('admin.orders.order-edit', compact('order', 'items'));
    }

    // Обновление информации о заказе
 public function update(Request $request, $orderId)
{
    $order = Order::findOrFail($orderId);

    // Update the total amount in the order
    $order->total_amount = $request->total_price;

    // Update the order date
    $order->order_date = $request->order_date;

    // Update the status of the order
    $order->status = $request->status;

    // Update the quantity of items in the order
    foreach ($request->quantity as $itemId => $quantity) {
        $orderItem = $order->orderItems()->where('item_id', $itemId)->first();
        if ($orderItem) {
            $orderItem->quantity = $quantity;
            $orderItem->save();
        }
    }

    $order->save();

    return redirect()->route('orders.index')->with('success', 'Заказ успешно изменён');
}

    // Удаление заказа
    public function destroy($orderId)
    {
        $order = Order::findOrFail($orderId);
    
        // Delete the associated OrderItems
        $order->orderItems()->delete();
    
        // Delete the Order
        $order->delete();
    
        return redirect()->route('orders.index')->with('success', 'Order deleted successfully');
    }
}