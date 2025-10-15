<?php

namespace App\Filament\Resources\Elections\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ElectionInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('title')
                    ->label('Titre')
                    ->color('primary')
                    ->weight('bold'),

                TextEntry::make('start_date')
                    ->dateTime('d M Y à H\hi')
                    ->label('Date de début')
                    ->color('primary')
                    ->weight('bold'),

                TextEntry::make('end_date')
                    ->dateTime('d M Y à H\hi')
                    ->label('Date de fin')
                    ->color('primary')
                    ->weight('bold'),

                TextEntry::make('status')
                    ->label('Statut')
                    ->color('primary')
                    ->weight('bold')
                    ->getStateUsing(fn($record) => match ($record->status) {
                        'draft' => 'Brouillon',
                        'upcoming' => 'À venir',
                        'ongoing' => 'En cours',
                        'completed' => 'Terminé',
                        default => $record->status,
                    }),

                TextEntry::make('description')
                    ->label('Description')
                    ->color('primary')
                    ->wrap()
                    ->columnSpanFull(),
            ]);
    }
}
