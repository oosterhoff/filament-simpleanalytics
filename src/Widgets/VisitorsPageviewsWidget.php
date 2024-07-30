<?php

namespace Oosterhoff\FilamentSimpleanalytics\Widgets;

use Filament\Widgets\ChartWidget;
use Oosterhoff\FilamentSimpleanalytics\SimpleAnalyticsApi;
use Filament\Support\Colors\Color;
use Filament\Support\Facades\FilamentColor;

class VisitorsPageviewsWidget extends ChartWidget
{
    protected static ?string $heading = 'Last 7 days - SimpleAnalytics';

    protected static string $color = 'primary';

    protected int | string | array $columnSpan = 'full';
    protected static ?string $maxHeight = '320px';

    protected function getData(): array
    {
        $api = new SimpleAnalyticsApi();
        $response = $api->getVisitorsAndPageviews();

        $labels = [];
        $visitors = [];
        $pageviews = [];

        // Check if 'histogram' key exists in the response
        if (isset($response['histogram']) && is_array($response['histogram'])) {
            foreach ($response['histogram'] as $item) {
                $labels[] = $item['date'];
                $visitors[] = $item['visitors'];
                $pageviews[] = $item['pageviews'];
            }
        }

        return [
            'datasets' => [
                [
                    'label' => 'Visitors',
                    'data' => $visitors,
                    'borderColor' => '#ff4f64',
                    'backgroundColor' => '#ff4f64',
                ],
                [
                    'label' => 'Pageviews',
                    'data' => $pageviews,
                    'borderColor' => '#13c2e1',
                    'backgroundColor' => '#13c2e1',
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}