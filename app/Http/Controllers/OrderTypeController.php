<?php

namespace App\Http\Controllers;

use App\Models\OrderType;
use App\Models\OrderTypeField;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class OrderTypeController extends Controller
{
    public function index()
    {
        OrderTypeField::ensureDefaults();

        return view('admin.order-types', [
            'orderTypes' => OrderType::with(['parent', 'fields'])->orderBy('name')->get(),
            'categories' => OrderType::CATEGORY_OPTIONS,
            'parents' => OrderType::whereNull('parent_id')->orderBy('name')->get(),
            'units' => OrderType::UNIT_OPTIONS,
            'fields' => OrderTypeField::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:order_types,name'],
            'type_level' => ['required', Rule::in(['parent', 'child'])],
            'parent_id' => [
                Rule::requiredIf($request->input('type_level') === 'child'),
                'nullable',
                'integer',
                'exists:order_types,id',
            ],
            'unit' => ['required', Rule::in(array_keys(OrderType::UNIT_OPTIONS))],
            'min_qty' => ['required', 'numeric', 'min:0.01'],
            'price' => ['required', 'numeric', 'min:0'],
            'fields' => ['array'],
            'fields.*' => ['integer', 'exists:order_type_fields,id'],
            'fields_order' => ['array'],
            'fields_order.*' => ['integer', 'exists:order_type_fields,id'],
        ]);

        $parentId = $validated['type_level'] === 'child' ? $validated['parent_id'] : null;
        $category = null;

        if ($parentId) {
            $parent = OrderType::find($parentId);
            if ($parent) {
                $category = $parent->category;
            }
        }

        $orderType = OrderType::create([
            'name' => $validated['name'],
            'price' => $validated['price'],
            'parent_id' => $parentId,
            'category' => $category ?? array_key_first(OrderType::CATEGORY_OPTIONS),
            'unit' => $validated['unit'],
            'min_qty' => $validated['min_qty'],
        ]);
        $fields = $validated['fields_order'] ?? $validated['fields'] ?? [];
        $sync = [];
        foreach (array_values($fields) as $index => $fieldId) {
            $sync[$fieldId] = ['sort' => $index + 1];
        }
        $orderType->fields()->sync($sync);

        return back()->with('status', 'Вид добавлен.');
    }

    public function update(Request $request, OrderType $orderType)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('order_types', 'name')->ignore($orderType->id)],
            'type_level' => ['required', Rule::in(['parent', 'child'])],
            'parent_id' => [
                Rule::requiredIf($request->input('type_level') === 'child'),
                'nullable',
                'integer',
                'exists:order_types,id',
                Rule::notIn([$orderType->id]),
            ],
            'unit' => ['required', Rule::in(array_keys(OrderType::UNIT_OPTIONS))],
            'min_qty' => ['required', 'numeric', 'min:0.01'],
            'price' => ['required', 'numeric', 'min:0'],
            'fields' => ['array'],
            'fields.*' => ['integer', 'exists:order_type_fields,id'],
            'fields_order' => ['array'],
            'fields_order.*' => ['integer', 'exists:order_type_fields,id'],
        ]);

        $parentId = $validated['type_level'] === 'child' ? $validated['parent_id'] : null;
        $category = $orderType->category;

        if ($parentId) {
            $parent = OrderType::find($parentId);
            if ($parent) {
                $category = $parent->category;
            }
        }

        $orderType->update([
            'name' => $validated['name'],
            'price' => $validated['price'],
            'parent_id' => $parentId,
            'category' => $category ?? array_key_first(OrderType::CATEGORY_OPTIONS),
            'unit' => $validated['unit'],
            'min_qty' => $validated['min_qty'],
        ]);
        $fields = $validated['fields_order'] ?? $validated['fields'] ?? [];
        $sync = [];
        foreach (array_values($fields) as $index => $fieldId) {
            $sync[$fieldId] = ['sort' => $index + 1];
        }
        $orderType->fields()->sync($sync);

        return back()->with('status', 'Вид обновлен.');
    }

    public function destroy(OrderType $orderType)
    {
        $orderType->delete();

        return back()->with('status', 'Вид удален.');
    }
}
