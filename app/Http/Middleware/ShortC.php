<?php

namespace App\Http\Middleware;

use App\Models\ShortCode;
use Closure;
use Illuminate\Http\Request;

class ShortC
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {


        $response= $next($request);
        //Kodas vykdomas po krovimo
        $html= $response->content();
        $ShortCode=ShortCode::all();
        foreach ($ShortCode as $short) {
            $html = str_replace($short->shortcode, $short->replace, $html);
        }
        $response->setContent($html);
        return $response;
    }
}
