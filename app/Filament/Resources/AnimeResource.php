<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Anime;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\TextInputColumn;
use App\Filament\Resources\AnimeResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\AnimeResource\RelationManagers;

class AnimeResource extends Resource
{
    protected static ?string $model = Anime::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                ->required()
                ->afterStateUpdated(function ($state, callable $set) {
                    // Automatically update slug when title changes
                    $set('slug', Str::slug($state));
                }),
                // TextInput::make('slug')
                // ->required(),
                TextInput::make('image'),
                TextInput::make('description'),
                Select::make('type')
                    ->options([
                        'Movie' => 'Movie',
                        'TV Series' => 'TV Series',
                        'OVA' => 'OVA',
                    ])->native(false),
                TextInput::make('studios'),
                DatePicker::make('date_aired'),
                Select::make('status')
                    ->options([
                        'Ongoing' => 'Ongoing',
                        'Completed' => 'Completed',
                    ])->native(false),
                TextInput::make('duration'),
                Select::make('quality')
                    ->options([
                        'HD' => 'HD',
                        'BD' => 'BD',
                    ])->native(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title'),
                TextColumn::make('description'),
                TextColumn::make('type'),
                TextColumn::make('studios'),
                TextColumn::make('date_aired'),
                TextColumn::make('status'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListAnimes::route('/'),
            'create' => Pages\CreateAnime::route('/create'),
            'edit' => Pages\EditAnime::route('/{record}/edit'),
        ];
    }
}
