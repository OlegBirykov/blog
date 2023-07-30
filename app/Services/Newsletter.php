<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class Newsletter
{
    private $apiKey;

    public function __construct() {
        $this->apiKey = config('services.mailopost.key');
    }

    public function subscribe(string $email, string $listId = null) {
        $listId ??= config('services.mailopost.lists.subscribers');
    
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->apiKey, 
            'Content-Type' => 'application/json',
        ])->post('https://api.mailopost.ru/v1/email/lists/' . $listId . '/recipients', [
            'email' => $email,
        ]);    

        return $response->successful();
    }
}
