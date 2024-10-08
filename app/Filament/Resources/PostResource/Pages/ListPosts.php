<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use App\Filament\Resources\PostResource\Widgets;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPosts extends ListRecords
{
    /**
     * The resource model.
     */
    protected static string $resource = PostResource::class;

    protected static ?string $title = 'Announcement';

    /**
     * The header actions.
     */
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Create New Announcement'),
        ];
    }

    /**
     * The header widgets.
     */
    protected function getHeaderWidgets(): array
    {
        return [
            Widgets\PostOverview::class,
        ];
    }
}
