<?php

namespace App\Filament\Resources\ResidentResource\Widgets;

use App\Models\Resident;
use Illuminate\Support\Number;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class ResidentOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $all = Resident::count();
        $males = Resident::where('gender', 'Male')->count();
        $females = Resident::where('gender', 'Female')->count();
        $seniors = Resident::whereRaw('TIMESTAMPDIFF(YEAR, date_of_birth, CURDATE()) >= 60')->count();

        return [
            Stat::make('Total Residents', Number::format($all))
                ->description('The total number of Residents')
                ->icon('heroicon-o-users'),

            Stat::make('Total Male', Number::format($males))
                ->description('The total number of Males')
                ->icon('heroicon-o-check-circle'),

            Stat::make('Total Female', Number::format($females))
                ->description('The total number of Females')
                ->icon('heroicon-o-x-circle'),
            Stat::make('Total Seniors', Number::format($seniors))
                ->description('The total number of Seniors')
                ->icon('heroicon-o-x-circle'),
        ];
    }
}
