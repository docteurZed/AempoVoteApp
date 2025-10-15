<?php

namespace App\Filament\Resources\Candidats;

use App\Filament\Resources\Candidats\Pages\CreateCandidat;
use App\Filament\Resources\Candidats\Pages\EditCandidat;
use App\Filament\Resources\Candidats\Pages\ListCandidats;
use App\Filament\Resources\Candidats\Pages\ViewCandidat;
use App\Filament\Resources\Candidats\Schemas\CandidatForm;
use App\Filament\Resources\Candidats\Schemas\CandidatInfolist;
use App\Filament\Resources\Candidats\Tables\CandidatsTable;
use App\Models\Candidat;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CandidatResource extends Resource
{
    protected static ?string $model = Candidat::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::UserCircle;

    protected static ?string $recordTitleAttribute = 'id';

    protected static ?string $modelLabel = 'Candidats';

    protected static ?string $navigationLabel = 'Candidats';

    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return CandidatForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return CandidatInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CandidatsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCandidats::route('/'),
            'create' => CreateCandidat::route('/create'),
            'view' => ViewCandidat::route('/{record}'),
            'edit' => EditCandidat::route('/{record}/edit'),
        ];
    }
}
