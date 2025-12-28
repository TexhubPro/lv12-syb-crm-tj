<?php

namespace App\Http\Controllers;

use App\Models\ProfileColor;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfileColorController extends Controller
{
    public function index()
    {
        return view('admin.profile-colors', [
            'profileColors' => ProfileColor::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:profile_colors,name'],
        ]);

        ProfileColor::create($validated);

        return back()->with('status', 'Цвет профиля добавлен.');
    }

    public function update(Request $request, ProfileColor $profileColor)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('profile_colors', 'name')->ignore($profileColor->id)],
        ]);

        $profileColor->update($validated);

        return back()->with('status', 'Цвет профиля обновлен.');
    }

    public function destroy(ProfileColor $profileColor)
    {
        $profileColor->delete();

        return back()->with('status', 'Цвет профиля удален.');
    }
}
