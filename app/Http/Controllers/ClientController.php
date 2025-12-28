<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ClientController extends Controller
{
    public function index()
    {
        return view('admin.clients', [
            'clients' => Client::orderBy('full_name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:50', 'unique:clients,phone'],
            'phone_secondary' => ['nullable', 'string', 'max:50'],
            'address' => ['nullable', 'string', 'max:255'],
            'comment' => ['nullable', 'string', 'max:2000'],
        ]);

        Client::create($validated);

        return back()->with('status', 'Клиент добавлен.');
    }

    public function update(Request $request, Client $client)
    {
        $validated = $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:50', Rule::unique('clients', 'phone')->ignore($client->id)],
            'phone_secondary' => ['nullable', 'string', 'max:50'],
            'address' => ['nullable', 'string', 'max:255'],
            'comment' => ['nullable', 'string', 'max:2000'],
        ]);

        $client->update($validated);

        return back()->with('status', 'Клиент обновлен.');
    }

    public function destroy(Client $client)
    {
        $client->delete();

        return back()->with('status', 'Клиент удален.');
    }
}
