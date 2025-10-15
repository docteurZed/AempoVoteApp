<?php

namespace App\Filament\Resources\Candidats\Schemas;

use App\Models\Election;
use App\Models\User;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class CandidatForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->label('Utilisateur')
                    ->required()
                    ->options(User::where('role', '!=', 'admin')
                                    ->where('is_active', true)
                                    ->get()
                                    ->pluck('name', 'id')
                                    ->toArray()
                        )
                    ->searchable()
                    ->preload(),

                Select::make('election_id')
                    ->label('Élection')
                    ->required()
                    ->options(Election::all()->pluck('title', 'id')->toArray())
                    ->searchable()
                    ->preload(),

                Select::make('poste')
                    ->options([
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
                    ])
                    ->label('Poste')
                    ->required(),
            ]);
    }
}
