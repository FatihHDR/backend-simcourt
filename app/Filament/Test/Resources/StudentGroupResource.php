<?php

namespace App\Filament\Test\Resources;

use App\Filament\Test\Resources\StudentGroupResource\Pages;
use App\Filament\Test\Resources\StudentGroupResource\RelationManagers;
use App\Models\StudentGroup;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StudentGroupResource extends Resource
{
    protected static ?string $model = StudentGroup::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationLabel = 'View Student Groups';
    protected static ?string $modelLabel = 'Student Group';
    protected static ?string $navigationGroup = 'Student Management';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('group_id')
                ->label('Group')
                ->relationship('group', 'name')
                ->required(),
            Forms\Components\Select::make('mahasiswa_id')
                ->label('Student')
                ->relationship('mahasiswa', 'name')
                ->required(),
            Forms\Components\TextInput::make('status')
                ->label('Status')
                ->nullable()
                ->placeholder('Enter the status'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('group.name')
                    ->label('Group')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('mahasiswa.name')
                    ->label('Student')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created At')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('group_id')
                    ->label('Group')
                    ->relationship('group', 'name')
                    ->placeholder('All Groups'),
                Tables\Filters\SelectFilter::make('mahasiswa_id')
                    ->label('Student')
                    ->relationship('mahasiswa', 'name')
                    ->placeholder('All Students'),
                Tables\Filters\SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'active' => 'Active',
                        'inactive' => 'Inactive',
                    ])
                    ->placeholder('All Statuses'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([]),
            ])
            ->headerActions([
                // Add any header actions if needed
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): array|string|null
    {
        return static::getModel()::count() > 0 ? 'danger' : 'bg-danger';
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStudentGroups::route('/'),
            'create' => Pages\CreateStudentGroup::route('/create'),
            'edit' => Pages\EditStudentGroup::route('/{record}/edit'),
        ];
    }
}
