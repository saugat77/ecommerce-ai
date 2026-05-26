<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GroqService
{
    public function chat($message)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('GROQ_API_KEY'),
            'Content-Type' => 'application/json',
        ])->post('https://api.groq.com/openai/v1/chat/completions', [
            'model' => 'llama-3.3-70b-versatile',
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'You are a helpful AI assistant for an ecommerce website.'
                ],
                [
                    'role' => 'user',
                    'content' => $message
                ]
            ],
        ]);

        return $response->json();
    }
}