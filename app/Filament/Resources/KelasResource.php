<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KelasResource\Pages;
use App\Models\Kelas;
use App\Models\Instruktur;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class KelasResource extends Resource
{
    protected static ?string $model = Kelas::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static ?string $navigationLabel = 'Edit Classes';
    protected static ?string $modelLabel = 'Classes';
    protected static ?string $navigationGroup = 'Student Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Class Information')
                    ->description('Please fill in the details of the class.')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Class Name')
                            ->required()
                            ->placeholder('Enter the class name')
                            ->helperText('Full name of the class.'),
                        
                        Forms\Components\Select::make('instructor_id')
                            ->label('Instructor')
                            ->relationship('instructor', 'name')
                            ->required()
                            ->placeholder('Select an instructor'),
                        
                        Forms\Components\TextInput::make('schedule')
                            ->label('Schedule')
                            ->required()
                            ->placeholder('Enter the class schedule'),
                        
                        Forms\Components\TextInput::make('code')
                            ->label('Class Code')
                            ->required()
                            ->placeholder('Enter the class code'),
                    ]),
            ]);
    }

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Class Name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('instructor.name')
                    ->label('Instructor')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('schedule')
                    ->label('Schedule')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('code')
                    ->label('Class Code')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created At')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('instructor_id')
                    ->label('Instructor')
                    ->relationship('instructor', 'name'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->headerActions([
                // Add any header actions if needed
            ])
            ->defaultSort('created_at', 'desc'); // Default sorting
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
            'index' => Pages\ListKelas::route('/'),
            'create' => Pages\CreateKelas::route('/create'),
            'edit' => Pages\EditKelas::route('/{record}/edit'),
        ];
    }
}