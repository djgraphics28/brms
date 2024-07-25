<?php

namespace App\Filament\Resources\BarangayOfficialResource\Pages;

use App\Filament\Resources\BarangayOfficialResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageBarangayOfficials extends ManageRecords
{
    protected static string $resource = BarangayOfficialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
