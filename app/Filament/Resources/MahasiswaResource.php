<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MahasiswaResource\Pages;
use App\Models\Mahasiswa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class MahasiswaResource extends Resource
{
    protected static ?string $model = Mahasiswa::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationLabel = 'View Students';
    protected static ?string $modelLabel = 'Students';
    protected static ?string $navigationGroup = 'Student Management';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('nim')
                ->label('NIM')
                ->required()
                ->placeholder('Enter the student\'s NIM'),
            Forms\Components\TextInput::make('name')
                ->label('Name')
                ->required()
                ->placeholder('Enter the student\'s name'),
            Forms\Components\TextInput::make('email')
                ->label('Email')
                ->required()
                ->email()
                ->placeholder('Enter the student\'s email'),
            Forms\Components\TextInput::make('password')
                ->label('Password')
                ->required()
                ->password()
                ->minLength(8)
                ->placeholder('Enter a secure password'),
            Forms\Components\Select::make('kelas_id')
                ->label('Class')
                ->relationship('kelas', 'name')
                ->required(),
            Forms\Components\Select::make('status')
                ->label('Status')
                ->options([
                    'koordinator' => 'Koordinator',
                    'anggota' => 'Anggota',
                ])
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nim')
                    ->label('NIM')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('role')
                    ->label('Role')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('kelas.name')
                    ->label('Class')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
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
                Tables\Filters\SelectFilter::make('role')
                    ->label('Role')
                    ->options([
                        'penggugat' => 'Penggugat',
                        'tergugat' => 'Tergugat',
                        'saksi' => 'Saksi',
                        'penasihat_hukum' => 'Penasihat Hukum',
                    ]),
                Tables\Filters\SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'koordinator' => 'Koordinator',
                        'anggota' => 'Anggota',
                    ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                ]),
            ])
            ->headerActions([
                // Add any header actions if needed
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function infolist(\Filament\Infolists\Infolist $infolist): \Filament\Infolists\Infolist
    {
        return $infolist->schema([
            \Filament\Infolists\Components\TextEntry::make('nim')->label('NIM'),
            \Filament\Infolists\Components\TextEntry::make('name')->label('Name'),
            \Filament\Infolists\Components\TextEntry::make('email')->label('Email'),
            \Filament\Infolists\Components\TextEntry::make('role')->label('Role'),
            \Filament\Infolists\Components\TextEntry::make('kelas.name')->label('Class'),
            \Filament\Infolists\Components\TextEntry::make('created_at')->label('Created At')->dateTime(),
        ]);
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
            'index' => Pages\ListMahasiswas::route('/'),
            'create' => Pages\CreateMahasiswa::route('/create'),
            'edit' => Pages\EditMahasiswa::route('/{record}/edit'),
        ];
    }
}