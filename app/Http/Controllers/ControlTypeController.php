<?php

namespace App\Http\Controllers;

use App\Models\ControlType;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ControlTypeController extends Controller
{
    public function index()
    {
        return view('admin.control-types', [
            'controlTypes' => ControlType::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:control_types,name'],
        ]);

        ControlType::create($validated);

        return back()->with('status', 'Тип управления добавлен.');
    }

    public function update(Request $request, ControlType $controlType)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('control_types', 'name')->ignore($controlType->id)],
        ]);

        $controlType->update($validated);

        return back()->with('status', 'Тип управления обновлен.');
    }

    public function destroy(ControlType $controlType)
    {
        $controlType->delete();

        return back()->with('status', 'Тип управления удален.');
    }
}
