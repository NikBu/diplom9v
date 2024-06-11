<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;

class AdminOrderController extends Controller
{
    // Отображение списка всех заказов
    public function index()
    {
        $orders = Order::all();
        return view('admin.orders.order-index', compact('orders'));
    }

    // Отображение формы создания заказа
    public function create()
    {
        $products = Product::all();
        return view('admin.orders.order-create', compact('products'));
    }

    // Сохранение нового заказа
    public function store(Request $request)
    {
        $order = new Order();
        $order->user_id = $request->input('user_id');
        $order->order_date = $request->input('order_date');
        $order->total_amount = $request->input('total_amount');
        $order->save();

        // Привязка выбранных продуктов с их количеством
        foreach ($request->input('selected_products', []) as $productId) {
            $order->products()->attach($productId, ['quantity' => $request->input('quantity.'. $productId)]);
        }

        return redirect()->back();
    }

    // Отображение формы редактирования заказа
    public function edit(Order $order)
    {
        $products = Product::all();
        return view('admin.orders.order-edit', compact('order', 'products'));
    }

    // Обновление информации о заказе
    public function update(Request $request, Order $order)
    {
        $order->user_id = $request->input('user_id');
        $order->order_date = $request->input('order_date');
        $order->total_amount = $request->input('total_amount');
        $order->save();

        // Синхронизация выбранных продуктов с их количеством
        $selectedProducts = $request->input('selected_products', []);
        $quantities = $request->input('quantity', []);
        $productsData = [];
        foreach ($selectedProducts as $productId) {
            $productsData[$productId] = ['quantity' => $quantities[$productId]?? 0];
        }
        $order->products()->sync($productsData);

        return redirect()->route('orders.index')->with('success', 'Заказ успешно обновлен');
    }

    // Удаление заказа
    public function destroy(Order $order)
    {
        $order->products()->detach(); // Отвязка связанных продуктов
        $order->delete(); // Удаление заказа

        return redirect()->route('orders.index')->with('success', 'Заказ успешно удален');
    }
}