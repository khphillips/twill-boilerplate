<?php

namespace App\Http\Middleware;

use Closure;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        $locale = request()->route('locale');
        if ($locale) {
            app()->setLocale($locale);
        } else {
            app()->setLocale('en');
        }
        return $next($request);
    }
}
