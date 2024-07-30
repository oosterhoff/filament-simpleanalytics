<?php

namespace Oosterhoff\FilamentSimpleanalytics\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Oosterhoff\FilamentSimpleanalytics\SimpleAnalyticsApi;

class TodayPageviewsWidget extends BaseWidget
{
    protected static ?int $sort = 10;

    protected function getStats(): array
    {
        $api = new SimpleAnalyticsApi();
        $response = $api->getVisitorsAndPageviews();

        $todayPageviews = 0;
        $chartData = [];

        if (isset($response['histogram']) && is_array($response['histogram'])) {
            $today = date('Y-m-d');
            $histogramData = array_slice($response['histogram'], -30); // Get last 30 days

            foreach ($histogramData as $item) {
                $chartData[] = $item['pageviews'];
                if ($item['date'] === $today) {
                    $todayPageviews = $item['pageviews'];
                }
            }
        }

        return [
            Stat::make('Today\'s Pageviews', $todayPageviews)
                ->description('Total pageviews today')
                ->descriptionIcon('heroicon-m-document-text')
                ->color('primary')
                ->chart($chartData),
        ];
    }
}