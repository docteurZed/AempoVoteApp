<?php

namespace App\Filament\Resources\Elections\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ElectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->label('Titre'),

                Textarea::make('description')
                    ->label('Description')
                    ->columnSpanFull(),

                DateTimePicker::make('start_date')
                    ->required()
                    ->label('Date de début'),

                DateTimePicker::make('end_date')
                    ->required()
                    ->label('Date de fin'),

                Select::make('status')
                    ->label('Statut')
                    ->options([
                        'draft' => 'Brouillon',
                        'upcoming' => 'À venir',
                        'ongoing' => 'En cours',
                        'completed' => 'Archivé',
                    ])
                    ->required()
                    ->default('draft'),
            ]);
    }
}
