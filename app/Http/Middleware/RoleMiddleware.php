<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,string $role): Response
    {
        if (!Auth::check()) {
            if ($role == 'admin') {
                return redirect()->route('admin.login');
            }elseif ($role == 'kaprodi') {
                return redirect()->route('kaprodi.login');
            }else {
                return redirect('/');
            }
        }
        if ($request->user()->role === $role) {
            return $next($request);
        }
        return dd($request->user());
    }
}
