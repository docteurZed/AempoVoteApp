<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class UserInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('student_number')
                    ->label('Numéro')
                    ->prefix('#')
                    ->color('primary')
                    ->weight('bold'),

                TextEntry::make('name')
                    ->label('Nom complet')
                    ->color('primary')
                    ->weight('bold'),

                TextEntry::make('email')
                    ->label('Email')
                    ->color('primary')
                    ->weight('bold'),

                TextEntry::make('phone')
                    ->label('Téléphone')
                    ->color('primary')
                    ->weight('bold'),

                IconEntry::make('is_active')
                    ->boolean()
                    ->label('Actif'),

                TextEntry::make('filiere')
                    ->label('Filière')
                    ->color('primary')
                    ->weight('bold')
                    ->getStateUsing(fn($record) => match ($record->filiere) {
                        'medecine' => 'Médecine',
                        'pharmacie' => 'Pharmacie',
                        'odonto' => 'Odonto-Stomatologie',
                        default => $record->filiere,
                    }),

                TextEntry::make('level')
                    ->label('Niveau')
                    ->color('primary')
                    ->weight('bold')
                    ->getStateUsing(fn($record) => match ($record->level) {
                        'l1' => 'Licence 1',
                        'l2' => 'Licence 2',
                        'l3' => 'Licence 3',
                        'm1' => 'Master 1',
                        'm2' => 'Master 2',
                        'd1' => 'Doctorat 1',
                        'd2' => 'Doctorat 2',
                        'd3' => 'Doctorat 3',
                        default => $record->level,
                    }),

                TextEntry::make('role')
                    ->label('Rôle')
                    ->color('primary')
                    ->weight('bold')
                    ->getStateUsing(fn($record) => match ($record->role) {
                        'member' => 'Membre',
                        'cei' => 'CEI',
                        'admin' => 'Admin',
                        default => $record->role,
                    }),

                TextEntry::make('created_at')
                    ->label('Créé le')
                    ->dateTime('d M Y à H\hi')
                    ->color('primary')
                    ->weight('bold'),
            ]);
    }
}
