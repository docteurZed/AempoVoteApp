<?php

namespace App\Filament\Resources\Communiques\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class CommuniqueInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('title')
                    ->label('Titre')
                    ->color('primary')
                    ->weight('bold'),

                TextEntry::make('published_at')
                    ->label('Date de publication')
                    ->dateTime('d M Y')
                    ->color('primary')
                    ->weight('bold'),

                TextEntry::make('file_path')
                    ->label('Pièce jointe')
                    ->url(fn ($record) => $record ? asset('storage/' . $record->file_path) : null)
                    ->openUrlInNewTab()
                    ->copyable()
                    ->icon('heroicon-o-document')
                    ->color('danger')
                    ->weight('bold'),

                TextEntry::make('description')
                    ->label('Description')
                    ->color('primary')
                    ->wrap()
                    ->columnSpanFull(),
            ]);
    }
}
