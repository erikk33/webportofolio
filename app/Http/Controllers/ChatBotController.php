<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatBotController extends Controller
{
    public function send(Request $request)
    {
        $message = strtolower(trim($request->input('message')));
        if (empty($message)) {
            return response()->json(['error' => 'Maaf Pesan anda tidak bisa diproses !'], 400);
        }
        $templateChatPath = base_path('app/chatbot_responses.json');
        $data = json_decode(file_get_contents($templateChatPath), true);
        if (array_key_exists($message, $data)) {
            return response()->json([
                'choices' => [
                    ["message" => ["content" => $data[$message]]]
                ]
            ]);
        }
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . env("API_TOGETHER"),
                'Content-Type' => 'application/json',
            ])->post('https://api.together.xyz/v1/chat/completions', [
                'model' => 'deepseek-ai/DeepSeek-R1-Distill-Llama-70B-free',
                'messages' => [
                    ['role' => 'user', 'content' => $message]
                ],
                'temperature' => 0.9,
            ]);

            return response()->json($response->json());
        } catch (Exception $e) {
            return response()->json([
                'error' => 'Gagal mendapatkan respon dari Together AI.',
                'details' => $e->getMessage()
            ], 500);
        }
    }
}
