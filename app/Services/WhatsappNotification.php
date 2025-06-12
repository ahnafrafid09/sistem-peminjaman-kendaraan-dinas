<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class WhatsappNotification
{
    protected $apiKey;
    protected $apiUrl;

    public function __construct()
    {
        $this->apiKey = env('FONNTE_API_KEY');
        $this->apiUrl = env('FONNTE_API_URL');
    }

    public function sendMessage($to, $message)
    {
        $response = Http::withHeaders([
            'Authorization' => $this->apiKey,
        ])
            ->asForm()
            ->post($this->apiUrl, [
                'target' => $to,
                'message' => $message,
                'countryCode' => '62',
            ]);

        return $response->json();
    }
}
