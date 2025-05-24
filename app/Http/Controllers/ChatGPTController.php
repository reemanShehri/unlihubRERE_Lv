<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatGPTController extends Controller
{




    public function showChatPage()
{
    return view('chat');
}


    public function chat(Request $request)
    {
        $request->validate([
            'content' => 'required|string'
        ]);

        $response = Http::withHeaders([
            "Content-Type" => "application/json",
            "Authorization" => "Bearer " . env('CHAT_GPT_KEY')
        ])->post("https://api.openai.com/v1/chat/completions", [
            "model" => "gpt-3.5-turbo",
            "messages" => [
                [
                    "role" => "user",
                    "content" => $request->input('content')
                ]
            ],
            "temperature" => 0,
            "max_tokens" => 2048
        ]);

        return response()->json(json_decode($response->body()));
    }


 
}