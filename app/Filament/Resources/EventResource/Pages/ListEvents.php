<?php

namespace App\Filament\Resources\EventResource\Pages;

use Filament\Pages\Actions;
use App\Filament\Resources\EventResource;
use Filament\Resources\Pages\ListRecords;

class ListEvents extends ListRecords
{
    protected static string $resource = EventResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
