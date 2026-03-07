<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAccountStatus
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Step 3: Check if the account is active
        $user = $request->user();

        if (!$user) {
            return redirect()->route('login');
        }

        // Step 4: If account is inactive — redirect with message
        if ($user->status === 'suspended') {
            return redirect()->route('account.suspended')
                ->with('error', 'Your account has been suspended. Please contact support.');
        }

        if ($user->status === 'incomplete') {
            return redirect()->route('account.incomplete')
                ->with('warning', 'Please complete your profile to continue.');
        }

        if ($user->status === 'unverified') {
            return redirect()->route('verification.notice')
                ->with('warning', 'Please verify your email address to access this page.');
        }

        // Account is active — proceed
        return $next($request);
    }
}
