<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureStudentDetailsFilled
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $user = Auth::user();

        // تأكد أن المستخدم مسجل دخول ومعلوماته كطالب غير موجودة
        if ($user && !$user->student) {
            return redirect()->route('student-details.create');
        }
        return $next($request);
    }
}
