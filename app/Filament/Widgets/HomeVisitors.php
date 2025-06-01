<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Redis;

class HomeVisitors extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total visits', Redis::get('home_page_visits'))->icon('heroicon-o-chart-bar')->color('success')
        ];
    }
    
}
