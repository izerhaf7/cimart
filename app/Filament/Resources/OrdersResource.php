<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrdersResource\Pages;
use App\Filament\Resources\OrdersResource\RelationManagers;
use App\Models\Orders;
use App\Models\Products;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrdersResource extends Resource
{
    protected static ?string $model = Orders::class;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        Section::make('User Information')
                        ->label("User Information")
                        ->schema([
                            TextInput::make('name'),
                            TextInput::make('phone_number'),
                            RichEditor::make('address'),
                        ])
                        ->relationship('User'),
                        Forms\Components\TextInput::make('user_id')
                            ->hidden()
                            ->disabled()
                            ->required()
                            ->numeric(),
                        Forms\Components\TextInput::make('total_price')
                            ->prefix('Rp')
                            ->required()
                            ->numeric(),
                        Forms\Components\TextInput::make('status')
                            ->required()
                            ->maxLength(50),
                    ]),
                Section::make('Order Items')
                    ->schema([
                        Repeater::make('OrderItems')
                            ->label('')
                            ->relationship()
                            ->columnSpan(2)
                            ->schema([
                                Select::make('product_id')
                                    ->label("Name")
                                    ->columnSpan([
                                        'md' => 5,
                                    ])
                                    ->options(Products::all()->pluck('name', 'id')),
                                TextInput::make('quantity')
                                    ->columnSpan([
                                        'md' => 2,
                                    ])
                                    ->numeric(),
                                TextInput::make('price')
                                    ->prefix('Rp')

                                    ->columnSpan([
                                        'md' => 3,
                                    ])
                                    ->numeric()
                            ])
                    ])


            ]);
    }

    public static function table(Table $table): Table
    {

        return $table
            ->modifyQueryUsing(function (Builder $query) {
                return $query->where('user_id', auth()->user()->id);
            })
            ->columns([
                Tables\Columns\TextColumn::make('User.name'),
                Tables\Columns\TextColumn::make('User.phone_number')
                ->label("Phone Number"),
                Tables\Columns\TextColumn::make('total_price')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrders::route('/create'),
            'edit' => Pages\EditOrders::route('/{record}/edit'),
        ];
    }
}
