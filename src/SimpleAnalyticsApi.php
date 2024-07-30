<?php

namespace Oosterhoff\FilamentSimpleanalytics;

use Illuminate\Support\Facades\Http;
use InvalidArgumentException;

class SimpleAnalyticsApi
{
    protected ?string $apiKey;
    protected ?string $website;

    public function __construct()
    {
        $this->apiKey = config('filament-simpleanalytics.api_key') ?: null;
        $this->website = config('filament-simpleanalytics.website') ?: null;

        if (!$this->website) {
            throw new InvalidArgumentException('SimpleAnalytics website is not configured.');
        }
    }

    public function getVisitorsAndPageviews(): array
    {
        $response = $this->makeRequest("https://simpleanalytics.com/{$this->website}.json", [
            'version' => 5,
            'start' => now()->subDays(7)->format('Y-m-d'),
            'end' => now()->format('Y-m-d'),
            'fields' => 'pageviews,visitors,histogram',
        ]);
        return $response ?? []; // Return the entire response
    }

    protected function makeRequest(string $url, array $query = []): array
    {
        $request = Http::withHeaders($this->getHeaders());

        if (!empty($query)) {
            $request = $request->withQueryParameters($query);
        }

        return $request->get($url)->json();
    }

    protected function getHeaders(): array
    {
        $headers = [];
        if ($this->apiKey) {
            $headers['Api-Key'] = $this->apiKey;
        }
        return $headers;
    }
}