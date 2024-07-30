<?php

namespace Oosterhoff\FilamentSimpleanalytics\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Oosterhoff\FilamentSimpleanalytics\SimpleAnalyticsApi;

class TodayVisitorsWidget extends BaseWidget
{
    protected static ?int $sort = 10;

    protected function getStats(): array
    {
        $api = new SimpleAnalyticsApi();
        $response = $api->getVisitorsAndPageviews();

        $todayVisitors = 0;
        $chartData = [];

        if (isset($response['histogram']) && is_array($response['histogram'])) {
            $today = date('Y-m-d');
            $histogramData = array_slice($response['histogram'], -30); // Get last 30 days

            foreach ($histogramData as $item) {
                $chartData[] = $item['visitors'];
                if ($item['date'] === $today) {
                    $todayVisitors = $item['visitors'];
                }
            }
        }

        return [
            Stat::make('Today\'s Visitors', $todayVisitors)
                ->description('Unique visitors today')
                ->descriptionIcon('heroicon-m-users')
                ->color('primary')
                ->chart($chartData),
        ];
    }
}