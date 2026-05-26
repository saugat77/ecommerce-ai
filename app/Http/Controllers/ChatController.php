<?php

namespace App\Http\Controllers;

use App\Services\GroqService;
use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;

class ChatController extends Controller
{
    public function chat(Request $request,  GroqService $groq)
    {
        $request->validate([
            'message' => 'required|string'
        ]);

        try {

            $message = $request->message;

            // 1. Search relevant products
            $products = \App\Models\Product::where('name', 'like', "%$message%")
                ->orWhere('description', 'like', "%$message%")
                ->orWhere('category', 'like', "%$message%")
                ->limit(5)
                ->get();

            // 2. Format product context
            $productContext = $products->map(function ($p) {
                return "- {$p->name} | Price: {$p->price} | Category: {$p->category} | Stock: {$p->stock}";
            })->implode("\n");

            if ($productContext === '') {
                $productContext = "No matching products found.";
            }

            // 3. Build system prompt
            $prompt = "
You are an AI assistant for an e-commerce store.

Rules:
- Answer ONLY using provided product data.
- If data is missing, say 'I don't know based on available products'.
- Be short and helpful.

PRODUCT DATA:
$productContext

USER QUESTION:
$message
        ";

            // 4. Send to AI
            $response = $groq->chat($prompt);

            return response()->json([
                'reply' => $response['choices'][0]['message']['content'] ?? 'No response',
                'products' => $products
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
