<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RecomendationResource\Pages;
use App\Filament\Resources\RecomendationResource\RelationManagers;
use App\Models\Products;
use App\Models\Recomendation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RecomendationResource extends Resource
{
    protected static ?string $model = Recomendation::class;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('product_id')
                    ->options(Products::all()->pluck('name', 'id'))
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('product_id')
                    ->numeric()
                    ->sortable(),
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
    public static function canViewAny(): bool
    {
        return auth()->user()->role == 'merchant';
    }
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRecomendations::route('/'),
            'create' => Pages\CreateRecomendation::route('/create'),
            'edit' => Pages\EditRecomendation::route('/{record}/edit'),
        ];
    }
}
