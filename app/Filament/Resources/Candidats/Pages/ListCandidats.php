<?php

namespace App\Filament\Resources\Candidats\Pages;

use App\Filament\Resources\Candidats\CandidatResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCandidats extends ListRecords
{
    protected static string $resource = CandidatResource::class;

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
