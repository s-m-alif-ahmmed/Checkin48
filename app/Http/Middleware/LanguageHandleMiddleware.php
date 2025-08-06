<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Symfony\Component\HttpFoundation\Response;

class LanguageHandleMiddleware
{

    public function handle(Request $request, Closure $next): Response
    {

        $locale = $request->get('locale', session('locale', Config::get('app.locale')));
        if (! in_array($locale,['en','ar'])) {
            App::setLocale(Config::get('app.locale'));
        }else{
            App::setLocale($locale);
        }
        return $next($request);
    }
}
