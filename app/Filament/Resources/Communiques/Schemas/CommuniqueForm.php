<?php

namespace App\Filament\Resources\Communiques\Schemas;

use DateTime;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CommuniqueForm
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

                FileUpload::make('file_path')
                    ->label('Pièce jointe')
                    ->disk('public')
                    ->directory('communiques')
                    ->maxSize(10240) // 10 MB
                    ->acceptedFileTypes(['application/pdf'])
                    ->columnSpanFull()
                    ->helperText('Formats acceptés : PDF. Taille maximale : 10MB.')
                    ->openable()
                    ->downloadable()
                    ->required(),

                DateTimePicker::make('published_at')
                    ->label('Date de publication')
                    ->displayFormat('d/m/Y'),
            ]);
    }
}
