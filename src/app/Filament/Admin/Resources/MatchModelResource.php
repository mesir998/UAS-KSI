<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\MatchModelResource\Pages;
use App\Models\MatchModel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class MatchModelResource extends Resource
{
    protected static ?string $model = MatchModel::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('club_id')
                    ->relationship('club', 'name')
                    ->required(),
                Forms\Components\TextInput::make('opponent')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('match_date'),
                Forms\Components\TextInput::make('location')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('result')
                    ->maxLength(255)
                    ->default(null),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('club.name')
                    ->label('Club'),
                Tables\Columns\TextColumn::make('opponent')
                    ->searchable(),
                Tables\Columns\TextColumn::make('match_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('location')
                    ->searchable(),
                Tables\Columns\TextColumn::make('result')
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMatchModels::route('/'),
            'create' => Pages\CreateMatchModel::route('/create'),
            'edit' => Pages\EditMatchModel::route('/{record}/edit'),
        ];
    }
}
