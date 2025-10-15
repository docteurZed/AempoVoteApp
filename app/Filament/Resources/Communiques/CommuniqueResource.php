<?php

namespace App\Filament\Resources\Communiques;

use App\Filament\Resources\Communiques\Pages\CreateCommunique;
use App\Filament\Resources\Communiques\Pages\EditCommunique;
use App\Filament\Resources\Communiques\Pages\ListCommuniques;
use App\Filament\Resources\Communiques\Pages\ViewCommunique;
use App\Filament\Resources\Communiques\Schemas\CommuniqueForm;
use App\Filament\Resources\Communiques\Schemas\CommuniqueInfolist;
use App\Filament\Resources\Communiques\Tables\CommuniquesTable;
use App\Models\Communique;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CommuniqueResource extends Resource
{
    protected static ?string $model = Communique::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::InformationCircle;

    protected static ?string $recordTitleAttribute = 'title';

    protected static ?string $modelLabel = 'Communiqués';

    protected static ?string $navigationLabel = 'Communiqués';

    protected static ?int $navigationSort = 4;

    public static function form(Schema $schema): Schema
    {
        return CommuniqueForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return CommuniqueInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CommuniquesTable::configure($table);
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
            'index' => ListCommuniques::route('/'),
            'create' => CreateCommunique::route('/create'),
            'view' => ViewCommunique::route('/{record}'),
            'edit' => EditCommunique::route('/{record}/edit'),
        ];
    }
}
