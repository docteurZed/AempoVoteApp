<?php

namespace App\Filament\Resources\Candidats\Pages;

use App\Filament\Resources\Candidats\CandidatResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateCandidat extends CreateRecord
{
    protected static string $resource = CandidatResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->title('Candidat créé avec succès')
            ->success();
    }
}
