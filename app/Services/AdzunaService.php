<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class AdzunaService
{
    public function fetchJobs($keyword = 'developer')
    {
        $appId = config('services.adzuna.id');
        $appKey = config('services.adzuna.key');

        if (!$appId || !$appKey) {
            return [];
        }

        $response = Http::get("https://api.adzuna.com/v1/api/jobs/gb/search/1", [
            'app_id' => $appId,
            'app_key' => $appKey,
            'what' => $keyword,
            'content-type' => 'application/json'
        ]);

        if ($response->successful()) {
            return $response->json()['results'] ?? [];
        }

        return [];
    }
}
