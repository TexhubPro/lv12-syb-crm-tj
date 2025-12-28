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
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:order_types,name'],
        ]);

        OrderType::create($validated);

        return back()->with('status', 'Вид добавлен.');
    }

    public function update(Request $request, OrderType $orderType)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('order_types', 'name')->ignore($orderType->id)],
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
