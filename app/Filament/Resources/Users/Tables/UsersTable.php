<?php

namespace App\Filament\Resources\Users\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('student_number')
                    ->label('#')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('name')
                    ->label('Nom et prénom(s)')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->sortable(),

                ToggleColumn::make('is_active')
                    ->label('Actif')
                    ->disabled(function ($record) {
                        return $record->id === \Illuminate\Support\Facades\Auth::user()->id;
                    })
                    ->inline(false)
                    ->onColor('success')
                    ->offColor('danger')
                    ->afterStateUpdated(function () {
                        Notification::make()
                            ->title('Statut mis à jour avec succès')
                            ->success()
                            ->send();
                    }),

                SelectColumn::make('filiere')
                    ->options([
                        'medecine' => 'Médecine',
                        'pharmacie' => 'Pharmacie',
                        'odonto' => 'Odonto-Stomatologie',
                    ])
                    ->afterStateUpdated(function () {
                        Notification::make()
                            ->title('Filière mise à jour avec succès')
                            ->success()
                            ->send();
                    })
                    ->placeholder('Sélectionner une filière')
                    ->label('Filière')
                    ->searchable()
                    ->sortable(),

                SelectColumn::make('level')
                    ->options([
                        'l1' => 'Licence 1',
                        'l2' => 'Licence 2',
                        'l3' => 'Licence 3',
                        'm1' => 'Master 1',
                        'm2' => 'Master 2',
                        'd1' => 'Doctorat 1',
                        'd2' => 'Doctorat 2',
                        'd3' => 'Doctorat 3',
                        'alumni' => 'Alumni',
                    ])
                    ->afterStateUpdated(function () {
                        Notification::make()
                            ->title('Niveau mis à jour avec succès')
                            ->success()
                            ->send();
                    })
                    ->placeholder('Sélectionner un niveau')
                    ->label('Niveau')
                    ->searchable()
                    ->sortable(),

                SelectColumn::make('role')
                    ->options([
                        'member' => 'Membre',
                        'cei' => 'CEI',
                        'admin' => 'Admin',
                    ])
                    ->label('Rôle')
                    ->afterStateUpdated(function () {
                        Notification::make()
                            ->title('Rôle mis à jour avec succès')
                            ->success()
                            ->send();
                    })
                    ->searchable()
                    ->sortable()
                    ->placeholder('Sélectionner un rôle'),
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
            ->emptyStateHeading('Aucun utilisateur enregistré');
    }
}
