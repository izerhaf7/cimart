<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WebsiteSettingsResource\Pages;
use App\Filament\Resources\WebsiteSettingsResource\RelationManagers;
use App\Models\WebsiteSettings;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use SebastianBergmann\CodeUnit\FileUnit;

class WebsiteSettingsResource extends Resource
{
    protected static ?string $model = WebsiteSettings::class;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\RichEditor::make('description')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('phone_number')
                    ->tel()
                    ->required()
                    ->maxLength(14),
                Repeater::make('person')
                ->relationship()
                ->schema([
                    TextInput::make('name'),
                    FileUpload::make('image_url')
                    ->disk('local')
                    ->image()
                    ->imageEditor()
                    ->required(),
                ])
            ]);
    }

    public static function canViewAny(): bool
    {
        return auth()->user()->role == 'merchant';
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('phone_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->html()
                    ->searchable(),
                Tables\Columns\ImageColumn::make('person.image_url')
                    ->disk('local')
                    ->searchable(),
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
            'index' => Pages\ListWebsiteSettings::route('/'),
            'create' => Pages\CreateWebsiteSettings::route('/create'),
            'edit' => Pages\EditWebsiteSettings::route('/{record}/edit'),
        ];
    }
}
