<?php

namespace App\Filament\Resources\UserResource\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Users', User::count())
                // ->description('32k increase')
                // ->descriptionIcon('heroicon-m-arrow-trending-up'),
            // Stat::make('Bounce rate', '21%')
            //     ->description('7% decrease')
            //     ->descriptionIcon('heroicon-m-arrow-trending-down'),
            // Stat::make('Average time on page', '3:12')
            //     ->description('3% increase')
            //     ->descriptionIcon('heroicon-m-arrow-trending-up'),
        ];
    }
}
