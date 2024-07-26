<?php

namespace App\Filament\Resources\RequestResource\Widgets;

use App\Models\Request;
use Illuminate\Support\Number;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class RequestOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $all = Request::count();
        $cedulas = Request::where('request_type', 'Cedula')->count();
        $barangayIds = Request::where('request_type', 'Barangay ID')->count();
        $barangayClearances = Request::where('request_type', 'Barangay Clearance')->count();
        $certificateOfIndigencys = Request::where('request_type', 'Certificate of Indigency')->count();

        return [
            Stat::make('Total Requests', Number::format($all))
                // ->description('The total number of Requests')
                ->icon('heroicon-o-users'),

            Stat::make('Total Cedula', Number::format($cedulas))
                // ->description('The total number of Cedula Requests')
                ->icon('heroicon-o-document'),

            Stat::make('Total Barangay ID', Number::format($barangayIds))
                // ->description('The total number of Barangay ID Requests')
                ->icon('heroicon-o-document'),

            Stat::make('Total Barangay Clearance', Number::format($barangayClearances))
                // ->description('The total number of Barangay Clearance Requests')
                ->icon('heroicon-o-document'),

            Stat::make('Total Certificate of Indigency', Number::format($certificateOfIndigencys))
                // ->description('The total number of Certificate of Indigency Requests')
                ->icon('heroicon-o-document'),


        ];
    }
}
