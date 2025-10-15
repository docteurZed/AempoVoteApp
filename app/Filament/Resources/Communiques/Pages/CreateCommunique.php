<?php

namespace App\Filament\Resources\Communiques\Pages;

use App\Filament\Resources\Communiques\CommuniqueResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateCommunique extends CreateRecord
{
    protected static string $resource = CommuniqueResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->title('Communiqué créé avec succès')
            ->success();
    }
}
