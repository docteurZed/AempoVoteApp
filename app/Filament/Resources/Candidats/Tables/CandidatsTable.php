<?php

namespace App\Filament\Resources\Candidats\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CandidatsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->label('Nom')
                    ->sortable(),

                TextColumn::make('election.title')
                    ->label('Élection')
                    ->sortable(),

                SelectColumn::make('poste')
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
                    ->afterStateUpdated(function () {
                        Notification::make()
                            ->title('Poste mis à jour avec succès')
                            ->success()
                            ->send();
                    })
                    ->placeholder('Sélectionner un poste')
                    ->label('Poste')
                    ->sortable()
                    ->searchable(),
                
                SelectColumn::make('statut')
                    ->options([
                        'en_attente' => 'En attente',
                        'valide' => 'Validé',
                        'rejete' => 'Rejeté',
                    ])
                    ->label('Statut')
                    ->afterStateUpdated(function () {
                        Notification::make()
                            ->title('Statut mis à jour avec succès')
                            ->success()
                            ->send();
                    })
                    ->placeholder('Sélectionner un statut')
                    ->sortable()
                    ->searchable(),
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
            ->emptyStateHeading('Aucun candidate enregistré');
    }
}
