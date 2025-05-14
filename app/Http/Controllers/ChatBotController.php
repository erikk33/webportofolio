<?php

// app/Http/Controllers/ChatBotController.php
//fungsi dari chatbot dengan integasi together ai
namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use PhpParser\Error;
use function Laravel\Prompts\error;

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
                    ['message' => ['content' => 'alamat banjar tegal buah jalan gunung mas perumahan graha parta lestari blok j no 4 no telp : +62895331309082 WA']]
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


        if (in_array($message, [
            "author sedang mengikuti pelatihan apa ?",
            "which learning author do now ?"
        ])) {
            return response()->json(["choices" =>
            [
                ["message" => ["content" => ["pelatihan google arcade 2025"]]]
            ]]);
        };

        if (in_array($message, [
            "apa saja pelatihan yang pernah diikuti oleh author ?"
        ])) {
            return response()->json([
                "choices" => [["message" => ["content" => ["digitaltalent, dikoding, dan google arcade"]]]]
            ]);
        }

        if (in_array($message, ["apa saja pengalaman magang author ?"])) {
            return response()->json([
                "choices" => [["message" => ["content" => "pengalaman magang di guestpro selama
            4 bulan bagian fullstack Developer"]]]
            ]);
        }

        if(in_array($message,["/help"])) {
            return response()->json(["choices" => [["message" => ["content" => "question can you write :
            siapa author website ini ?
            tentang server ini ?
            kapan web porto ini dibuat ?
            informasi contact author ?
            framework yang digunakan web ini ?
            versi laravel yang digunakan ?
            region author ?"]]]
        ]);
        }

        //nanti bisa ditambahkan try and catch cari referensi lebih dalam di google atau internet
        // try {

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
        // if($response->json() == response(null)) {
        //     throw new Error("database mode tidak ditemukan");
        // }
    // }
            // catch (error) {

            //     }


            }
}
