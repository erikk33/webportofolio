<?php

// app/Http/Controllers/ChatBotController.php
//fungsi dari chatbot dengan integasi together ai
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatBotController extends Controller
{
    public function send(Request $request)
    {
        $message = $request->input('message');
        if (in_array($message, [
            "siapa author website ini ?",
            'siapa pembuat website ini?',
            'author website ini siapa?',
            'siapa pemilik website ini?',
            'siapa pemilik website ini',
            'siapa pembuat website ini',
            "siapa author website ini"
        ])) {
            return response()->json([
                'choices' => [
                    ['message' => ['content' => 'Putu Erik Cahyadi']]
                ]
            ]);
        }

        if (in_array($message, [
            "About this server ?",
            "about this server ?",
            "tentang server ini ?"
        ])) {
            return response()->json([
                'choices' => [
                    ['message' => ['content' => 'Server ini dibuat dengan together ai']]
                ]
            ]);
        }

        if (in_array($message, [
            "kapan web porto ini dibuat ?",
            "kapan web ini dibuat ?"
        ])) {
            return response()->json([
                'choices' => [
                    ['message' => ['content' => 'web ini dibuat tahun 2025']]
                ]
            ]);
        };

        if (in_array($message, [
            "informasi contact author ?",
            'contact author information ?'
        ])) {
            return response()->json([
                'choices' => [
                    ['message' => ['content' => 'alamat banjar tegal buah jalan gunung mas perumaha graha parta lestari blok j no 4 no telp : +62895331309082 WA']]
                ]
            ]);
        };



        if (in_array($message, [
            "framework yang digunakan web ini ?"
        ])) {
            return response()->json([
                "choices" => [
                    ["message" => ["content" => "laravel dan bootstrap"]]
                ]
            ]);
        };










        if (in_array($message, [
            "versi laravel yang digunakan ?"
        ])) {
            return response()->json(["choices" => [
                ["message" => ["content" => "versi 10.0"]]
            ]]);
        };

        if (in_array($message, [
            "region author ?"
        ])) {
            return response()->json([
                "choices" => [["message" => ["content" => "indonesia"]]]
            ]);
        };
        $response = Http::withHeaders([
            'Authorization' => 'Bearer 9bcdda54b8dabe0622af6cd81e568a2176d5374a3ebe0b569f9c17a6d7f78ef9',
            'Content-Type' => 'application/json',
        ])->post('https://api.together.xyz/v1/chat/completions', [
            'model' => 'deepseek-ai/DeepSeek-R1-Distill-Llama-70B-free', // contoh model
            'messages' => [
                ['role' => 'user', 'content' => $message]
            ],
            'temperature' => 0.9,
        ]);

        return response()->json($response->json());
    }
}
