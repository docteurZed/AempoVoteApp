<?php

namespace App\Filament\Resources\Communiques\Pages;

use App\Filament\Resources\Communiques\CommuniqueResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewCommunique extends ViewRecord
{
    protected static string $resource = CommuniqueResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make()
                ->label('Modifier')
                ->icon('heroicon-o-pencil')
                ->color('warning'),
        ];
    }
}
