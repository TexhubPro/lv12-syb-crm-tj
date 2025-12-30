<?php

namespace App\Http\Controllers;

use App\Models\OrderType;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class OrderTypeController extends Controller
{
    public function index()
    {
        return view('admin.order-types', [
            'orderTypes' => OrderType::orderBy('name')->get(),
            'categories' => OrderType::CATEGORY_OPTIONS,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:order_types,name'],
            'category' => ['required', Rule::in(array_keys(OrderType::CATEGORY_OPTIONS))],
            'price' => ['required', 'numeric', 'min:0'],
        ]);

        OrderType::create($validated);

        return back()->with('status', 'Вид добавлен.');
    }

    public function update(Request $request, OrderType $orderType)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('order_types', 'name')->ignore($orderType->id)],
            'category' => ['required', Rule::in(array_keys(OrderType::CATEGORY_OPTIONS))],
            'price' => ['required', 'numeric', 'min:0'],
        ]);

        $orderType->update($validated);

        return back()->with('status', 'Вид обновлен.');
    }

    public function destroy(OrderType $orderType)
    {
        $orderType->delete();

        return back()->with('status', 'Вид удален.');
    }
}
