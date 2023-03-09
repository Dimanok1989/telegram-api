<?php

namespace App\Http\Controllers;

use App\Models\ApiToken;
use App\Models\ApiTokenAccess;
use App\Models\BotLogMessage;
use Illuminate\Http\Request;

class WebhookController extends Controller
{
    /**
     * Входящий вебхук
     * 
     * @param  \Illumiante\Http\Request  $request
     * @param  null|string  $token
     * @return \Illuminate\Http\JsonResponse
     */
    public function input(Request $request, ?string $token = null)
    {
        if ($api_token = ApiToken::where('token', $token)->first()) {

            $api_token_access = ApiTokenAccess::firstOrNew([
                'token_id' => $api_token->id,
                'date' => now()->format("Y-m-d"),
            ]);

            $api_token_access->count = (int) $api_token_access->count + 1;
            $api_token_access->save();
        }

        BotLogMessage::create([
            'api_token_id' => $api_token->id ?? null,
            'token' => $token,
            'request_data' => $request->all(),
        ]);

        return response()->json([
            'message' => "Webhook successfully accepted",
        ]);
    }
}
