<?php

namespace App\Filament\Resources\Candidats\Pages;

use App\Filament\Resources\Candidats\CandidatResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditCandidat extends EditRecord
{
    protected static string $resource = CandidatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make()
                ->label('Voir')
                ->icon('heroicon-o-eye')
                ->color('info'),
                
            DeleteAction::make()
                ->label('Supprimer')
                ->icon('heroicon-o-trash')
                ->color('danger'),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->title('Candidat mis à jour avec succès')
            ->success();
    }
}
