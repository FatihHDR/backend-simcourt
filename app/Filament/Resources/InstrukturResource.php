<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InstrukturResource\Pages;
use App\Models\Instruktur;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class InstrukturResource extends Resource
{
    protected static ?string $model = Instruktur::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-library';
    protected static ?string $navigationLabel = 'Add Instructors';
    protected static ?string $modelLabel = 'Instructor';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Instruktur Information')
                    ->description('Please fill in the details of the instructor.')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Name')
                            ->required()
                            ->placeholder('Enter the instructor\'s name')
                            ->helperText('Full name of the instructor.'),
                        
                        Forms\Components\TextInput::make('nip')
                            ->label('NIP')
                            ->required()
                            ->unique()
                            ->placeholder('Enter the instructor\'s NIP')
                            ->helperText('Unique identification number for the instructor.'),
                        
                        Forms\Components\TextInput::make('email')
                            ->label('Email')
                            ->required()
                            ->email()
                            ->unique()
                            ->placeholder('Enter the instructor\'s email')
                            ->helperText('A valid email address for the instructor.'),
                        
                        Forms\Components\TextInput::make('password')
                            ->label('Password')
                            ->required()
                            ->password()
                            ->minLength(8)
                            ->placeholder('Enter a secure password')
                            ->helperText('Password must be at least 8 characters long.')
                            ->dehydrateStateUsing(fn ($state) => bcrypt($state)),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nip')
                    ->label('NIP')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created At')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(),
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
            'index' => Pages\ListInstrukturs::route('/'),
            'create' => Pages\CreateInstruktur::route('/create'),
            'edit' => Pages\EditInstruktur::route('/{record}/edit'),
        ];
    }
}