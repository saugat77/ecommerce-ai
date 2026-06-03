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
           $products = \App\Models\Product::where('is_active', true)
                ->limit(20)
                ->get();

            // 2. Format product context
            $productContext = $products->map(function ($p) {
              return "ID: {$p->id}
            Name: {$p->name}
            Price: {$p->price}
            Stock: {$p->stock}
            Discount: {$p->discount_amount}";
            })->implode("\n\n");

            if ($productContext === '') {
                $productContext = "No matching products found.";
            }
            // 3. Build system prompt
            $prompt = "
You are an AI assistant for an e-commerce store.
Format:
{
  \"summary\": \"short explanation\",
  \"products\": [
    {
      \"id\": 0,
      \"name\": \"\",
      \"price\": 0,
      \"discount\": 0,
      \"stock\": 0,
      \"reason\": \"\"
    }
  ]
}

Rules:
1. Understand user intent (best, cheap, premium, budget, etc.)
2. Rank products accordingly
3. Recommend ONLY from given list
4. Return top 3 products with reason


PRODUCT DATA:
$productContext

USER QUESTION:
$message
        ";

            // 4. Send to AI
            $response = $groq->chat($prompt);

            $content = $response['choices'][0]['message']['content'];

            $data = json_decode($content, true);
            return response()->json([
                'reply' => $data,
                'type' => isset($data['products']) ? 'products' : 'text',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
