<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\GradeLogResource\Pages;
use App\Models\GradeLog;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class GradeLogResource extends Resource
{
    protected static ?string $model = GradeLog::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('grade_id')
                    ->label('Course Name')
                    ->relationship('grade', 'course_name')
                    ->required()
                    ->searchable(),

                Forms\Components\Select::make('student_id')
                    ->label('Student')
                    ->relationship('student', 'name')
                    ->required()
                    ->searchable(),

                Forms\Components\TextInput::make('action')
                    ->label('Action')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('grade.course_name')
                    ->label('Course')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('student.name')
                    ->label('Student')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('action')
                    ->label('Action')
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
            'index' => Pages\ListGradeLogs::route('/'),
            'create' => Pages\CreateGradeLog::route('/create'),
            'edit' => Pages\EditGradeLog::route('/{record}/edit'),
        ];
    }
}
