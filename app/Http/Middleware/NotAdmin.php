<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NotAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (Auth::check() && Auth::user()->role === 'admin') {
            // ارجع لصفحة معينة، مثلاً الـ dashboard مع رسالة خطأ
            return redirect('/dashboard')->with('error', 'غير مسموح للأدمن الدخول هنا.');
        }
        return $next($request);
    }
}
