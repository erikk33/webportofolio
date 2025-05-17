<?php

// app/Http/Controllers/ChatBotController.php
//fungsi dari chatbot dengan integasi together ai
namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\http\Response;

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
            "siapa author website ini",
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

        if (in_array($message, ["/help"])) {
            return response()->json([
                "choices" => [["message" => ["content" => "question can you write :
            <p>siapa author website ini ?

            <p>tentang server ini ?

            <p>kapan web porto ini dibuat ?

            <p>informasi contact author ?

            <p>framework yang digunakan web ini ?

            <p>versi laravel yang digunakan ?

            <p>region author ?

            <p>akun linkedin author ?

            <p>akun sosial media author ?

            <p>informasi api author ?
            "]]]
            ]);
        }
        //definisikan clear chat disini
        if (in_array($message, ["exit"])) {
            return response()->json();
        }

        if (in_array($message, [
            "akun linkedin author ?"
        ])) {
            return response()->json(["choices" => [
                ["message" => ["content" => "https://www.linkedin.com/in/putu-erik-cahyadi-3b2100244/"]]
            ]]);
        }

        if (in_array($message, [
            "akun sosial media author ?"
        ])) {
            return response()->json([
                "choices" => [["message" => ["content" => "Facebook : https://www.facebook.com/putu.erik.56/
            Instagram : https://www.instagram.com/rikkukawakami/"]]]
            ]);
        }










        if (in_array($message, ["informasi api author ?"])) {
            return response()->json(["choices" => [["message" => ["content" => "https://6555abbb84b36e3a431e0cff.mockapi.io/db_nuclear"]]]
        ]);
        }





        if(in_array($message,["rekomendasi anime action menurut author ?"])) {
            return response()->json(["choices" =>[["message" => ["content" => "anime action terbaik menurut author :
            windbreaker dan kimetsu no yaiba"]]]
        ]);
        }
        //nanti bisa ditambahkan try 2and catch cari referensi lebih dalam di google atau internet
        try {

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . env("API_TOGETHER"),
                'Content-Type' => 'application/json',
            ])->post('https://api.together.xyz/v1/chat/completions', [
                'model' => 'deepseek-ai/DeepSeek-R1-Distill-Llama-70B-free', // contoh model
                'messages' => [
                    ['role' => 'user', 'content' => $message]
                ],
                'temperature' => 0.9,
            ]);

            if ($message !== NULL) {
                return response()->json($response->json());
            } else {
                return str("cannot procees this chat because empty !!!");
            }
        } catch (error) {
        }
    }
}
