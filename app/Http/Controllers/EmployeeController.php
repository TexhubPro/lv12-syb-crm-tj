<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('admin.employees', [
            'employees' => User::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:50', 'unique:users,phone'],
            'password' => ['required', 'string', 'min:6'],
            'role' => ['required', Rule::in(['manager', 'admin', 'surveyor'])],
        ]);

        User::create($validated);

        return back()->with('status', 'Сотрудник добавлен.');
    }

    public function update(Request $request, User $employee)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:50', Rule::unique('users', 'phone')->ignore($employee->id)],
            'password' => ['nullable', 'string', 'min:6'],
            'role' => ['required', Rule::in(['manager', 'admin', 'surveyor'])],
        ]);

        if ($validated['password'] === null || $validated['password'] === '') {
            unset($validated['password']);
        }

        $employee->update($validated);

        return back()->with('status', 'Сотрудник обновлен.');
    }

    public function destroy(User $employee)
    {
        $employee->delete();

        return back()->with('status', 'Сотрудник удален.');
    }
}
