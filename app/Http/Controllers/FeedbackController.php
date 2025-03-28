<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Supporter\Facades\Http;

class FeedbackController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request ->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        $response = Http::post
        ('Make_Webhook_Url',[
            'name' => $validated['name'],
            'emai' => $validated['email'],
            'message' => $validated['message'],
        ]);

        return response()->json([
            'message' => 'Thank you for your feedback!',
            'success' => true,
        ]);
    }
}
