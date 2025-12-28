<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SurveyorMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        if (!$user) {
            return redirect()->route('login');
        }

        if ($request->is('/')) {
            return redirect()->route('surveyor.cashier');
        }

        if ($user->role !== 'surveyor') {
            abort(403);
        }

        return $next($request);
    }
}
