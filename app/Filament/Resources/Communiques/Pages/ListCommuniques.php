<?php

namespace App\Filament\Resources\Communiques\Pages;

use App\Filament\Resources\Communiques\CommuniqueResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCommuniques extends ListRecords
{
    protected static string $resource = CommuniqueResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Ajouter')
                ->icon('heroicon-o-plus')
                ->color('primary'),
        ];
    }
}
