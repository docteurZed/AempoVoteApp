<?php

namespace App\Filament\Resources\Candidats\Pages;

use App\Filament\Resources\Candidats\CandidatResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewCandidat extends ViewRecord
{
    protected static string $resource = CandidatResource::class;

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
