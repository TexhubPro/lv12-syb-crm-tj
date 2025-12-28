<?php

namespace App\Http\Controllers;

use App\Models\CorniceType;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CorniceTypeController extends Controller
{
    public function index()
    {
        return view('admin.cornice-types', [
            'corniceTypes' => CorniceType::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:cornice_types,name'],
        ]);

        CorniceType::create($validated);

        return back()->with('status', 'Тип карниза добавлен.');
    }

    public function update(Request $request, CorniceType $corniceType)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('cornice_types', 'name')->ignore($corniceType->id)],
        ]);

        $corniceType->update($validated);

        return back()->with('status', 'Тип карниза обновлен.');
    }

    public function destroy(CorniceType $corniceType)
    {
        $corniceType->delete();

        return back()->with('status', 'Тип карниза удален.');
    }
}
