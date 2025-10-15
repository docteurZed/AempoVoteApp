<?php

namespace App\Filament\Resources\Candidats\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class CandidatInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('user.name')
                    ->label('Nom')
                    ->color('primary')
                    ->weight('bold'),

                TextEntry::make('election.title')
                    ->label('Élection')
                    ->color('primary')
                    ->weight('bold'),

                TextEntry::make('poste')
                    ->label('Poste')
                    ->color('primary')
                    ->weight('bold')
                    ->getStateUsing(fn ($record) => match ($record->poste) {
                        'president' => 'Président',
                        'vpi' => 'Vice-Président aux affaires internes',
                        'vpe' => 'Vice-Président aux affaires externes',
                        'secretaire' => 'Secrétaire',
                        'tresorier' => 'Trésorier',
                        'scome' => 'Responsable SCOME',
                        'score' => 'Responsable SCORE',
                        'scope' => 'Responsable SCOPE',
                        'scora' => 'Responsable SCORA',
                        'scoph' => 'Responsable SCOPH',
                        'scohe' => 'Responsable SCOHE',
                        'communication' => 'Chargé de Communication',
                        'sport' => 'Chargé des activités culturelles et Sportives',
                        default => $record->poste,
                    }),

                TextEntry::make('statut')
                    ->label('Statut')
                    ->color('primary')
                    ->weight('bold')
                    ->getStateUsing(fn ($record) => match ($record->statut) {
                        'en_attente' => 'En attente',
                        'valide' => 'Validé',
                        'rejete' => 'Rejeté',
                        default => $record->statut,
                    }),

                TextEntry::make('created_at')
                    ->dateTime('d M Y à H\hi')
                    ->label('Créé le')
                    ->color('primary')
                    ->weight('bold'),
            ]);
    }
}
