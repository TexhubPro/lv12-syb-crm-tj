<?php

namespace App\Http\Controllers;

use App\Models\FabricCode;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FabricCodeController extends Controller
{
    public function index()
    {
        return view('admin.fabric-codes', [
            'fabricCodes' => FabricCode::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:fabric_codes,name'],
        ]);

        FabricCode::create($validated);

        return back()->with('status', 'Код ткани добавлен.');
    }

    public function update(Request $request, FabricCode $fabricCode)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('fabric_codes', 'name')->ignore($fabricCode->id)],
        ]);

        $fabricCode->update($validated);

        return back()->with('status', 'Код ткани обновлен.');
    }

    public function destroy(FabricCode $fabricCode)
    {
        $fabricCode->delete();

        return back()->with('status', 'Код ткани удален.');
    }
}
