<?php

namespace App\Http\Middleware;

use App\Models\ApiToken;
use App\Models\ApiTokenAccess;
use Closure;
use Illuminate\Http\Request;

class CheckAccessData
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
        if (!$token = ApiToken::whereToken($request->token)->first())
            return response()->json(['message' => "Недействительный токен"], 401);

        if ($token->validity_at < now())
            return response()->json(['message' => "Доступ ограничен"], 403);

        $access = ApiTokenAccess::firstOrNew([
            'token_id' => $token->id,
            'date' => now()->format("Y-m-d"),
        ]);

        $access->count = (int) $access->count + 1;
        $access->save();

        return $next($request);
    }
}
