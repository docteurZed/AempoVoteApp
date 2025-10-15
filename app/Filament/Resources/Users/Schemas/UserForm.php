<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nom complet')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),

                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required()
                    ->maxLength(255),

                TextInput::make('phone')
                    ->label('Téléphone')
                    ->tel()
                    ->maxLength(20),

                Select::make('filiere')
                    ->label('Filière')
                    ->options([
                        'medecine' => 'Médecine',
                        'pharmacie' => 'Pharmacie',
                        'odonto' => 'Odonto-Stomatologie',
                    ])
                    ->required(false),

                Select::make('level')
                    ->label('Niveau')
                    ->options([
                        'l1' => 'Licence 1',
                        'l2' => 'Licence 2',
                        'l3' => 'Licence 3',
                        'm1' => 'Master 1',
                        'm2' => 'Master 2',
                        'd1' => 'Doctorat 1',
                        'd2' => 'Doctorat 2',
                        'd3' => 'Doctorat 3',
                    ])
                    ->required(false),

                Select::make('role')
                    ->label('Rôle')
                    ->options([
                        'member' => 'Membre',
                        'cei' => 'CEI',
                        'admin' => 'Admin',
                    ])
                    ->default('member')
                    ->required(),

                Toggle::make('is_active')
                    ->label('Actif')
                    ->required()
                    ->onColor('success')
                    ->offColor('danger')
                    ->columnSpanFull(),
            ]);
    }
}
