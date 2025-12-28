<?php

namespace App\Http\Controllers;

use App\Models\BankTransaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BankController extends Controller
{
    public function index()
    {
        $transactions = BankTransaction::query()
            ->latest('occurred_at')
            ->latest()
            ->get();

        $income = BankTransaction::where('type', 'income')->sum('amount');
        $expenses = BankTransaction::where('type', 'expense')->sum('amount');
        $paidDebts = BankTransaction::where('type', 'debt')->where('is_paid', true)->sum('amount');
        $openDebts = BankTransaction::where('type', 'debt')->where('is_paid', false)->sum('amount');

        $balance = $income - $expenses - $paidDebts;

        return view('admin.bank', [
            'transactions' => $transactions,
            'stats' => [
                'income' => $income,
                'expenses' => $expenses,
                'paidDebts' => $paidDebts,
                'openDebts' => $openDebts,
                'balance' => $balance,
            ],
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => ['required', Rule::in(['income', 'expense', 'debt'])],
            'title' => ['required', 'string', 'max:255'],
            'amount' => ['required', 'numeric', 'min:0'],
            'description' => ['nullable', 'string', 'max:2000'],
            'occurred_at' => ['required', 'date'],
            'due_date' => ['nullable', 'date'],
            'is_paid' => ['nullable', 'boolean'],
        ]);

        BankTransaction::create([
            'user_id' => $request->user()->id,
            'type' => $validated['type'],
            'title' => $validated['title'],
            'amount' => $validated['amount'],
            'description' => $validated['description'] ?? null,
            'occurred_at' => $validated['occurred_at'],
            'due_date' => $validated['type'] === 'debt' ? ($validated['due_date'] ?? null) : null,
            'is_paid' => $validated['type'] === 'debt' ? (bool) ($validated['is_paid'] ?? false) : true,
            'paid_at' => $validated['type'] === 'debt' && !empty($validated['is_paid'])
                ? Carbon::now()
                : null,
        ]);

        return back()->with('status', 'Операция добавлена.');
    }

    public function update(Request $request, BankTransaction $transaction)
    {
        $validated = $request->validate([
            'type' => ['required', Rule::in(['income', 'expense', 'debt'])],
            'title' => ['required', 'string', 'max:255'],
            'amount' => ['required', 'numeric', 'min:0'],
            'description' => ['nullable', 'string', 'max:2000'],
            'occurred_at' => ['required', 'date'],
            'due_date' => ['nullable', 'date'],
        ]);

        $transaction->update([
            'type' => $validated['type'],
            'title' => $validated['title'],
            'amount' => $validated['amount'],
            'description' => $validated['description'] ?? null,
            'occurred_at' => $validated['occurred_at'],
            'due_date' => $validated['type'] === 'debt' ? ($validated['due_date'] ?? null) : null,
            'is_paid' => $validated['type'] === 'debt' ? $transaction->is_paid : true,
        ]);

        return back()->with('status', 'Операция обновлена.');
    }

    public function pay(BankTransaction $transaction)
    {
        if ($transaction->type !== 'debt') {
            return back();
        }

        $transaction->update([
            'is_paid' => true,
            'paid_at' => Carbon::now(),
        ]);

        return back()->with('status', 'Долг отмечен как оплаченный.');
    }

    public function destroy(BankTransaction $transaction)
    {
        $transaction->delete();

        return back()->with('status', 'Операция удалена.');
    }
}
