<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class Newsletter
{
    public function subscribe(string $email, string $listId = null) {
        $apiKey = config('services.mailopost.key');
        $listId ??= config('services.mailopost.lists.subscribers');
    
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $apiKey, 
            'Content-Type' => 'application/json',
        ])->post('https://api.mailopost.ru/v1/email/lists/' . $listId . '/recipients', [
            'email' => $email,
        ]);    

        return $response->successful();
    }
}
