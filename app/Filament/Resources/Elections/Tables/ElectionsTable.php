<?php

namespace App\Filament\Resources\Elections\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ElectionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Titre')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('start_date')
                    ->dateTime('d M Y à H\hi')
                    ->label('Date de début')
                    ->sortable(),

                TextColumn::make('end_date')
                    ->dateTime('d M Y à H\hi')
                    ->label('Date de fin')
                    ->sortable(),

                SelectColumn::make('status')
                    ->label('Statut')
                    ->options(function ($record) {
                        $options = [
                            'draft' => 'Brouillon',
                            'upcoming' => 'À venir',
                            'ongoing' => 'En cours',
                            'completed' => 'Archivé',
                        ];

                        // Si le statut actuel n'est plus "draft", on retire l'option "draft"
                        if ($record && $record->status !== 'draft') {
                            unset($options['draft']);
                        }

                        return $options;
                    })
                    ->sortable()
                    ->searchable()
                    ->afterStateUpdated(function () {
                        Notification::make()
                            ->title('Statut mis à jour avec succès')
                            ->success()
                            ->send();
                    })
                    ->placeholder('Sélectionner un statut'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make()
                    ->label('')
                    ->icon('heroicon-o-eye')
                    ->color('info'),

                EditAction::make()
                    ->label('')
                    ->icon('heroicon-o-pencil')
                    ->color('warning'),

                DeleteAction::make()
                    ->label('')
                    ->icon('heroicon-o-trash')
                    ->color('danger'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateHeading('Aucune élection enregistrée');
    }
}
