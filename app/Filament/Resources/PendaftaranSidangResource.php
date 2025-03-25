<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PendaftaranSidangResource\Pages;
use App\Models\PendaftaranSidang;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PendaftaranSidangResource extends Resource
{
    protected static ?string $model = PendaftaranSidang::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static ?string $navigationLabel = 'Court Registrations';
    protected static ?string $modelLabel = 'Court Registration';
    protected static ?string $navigationGroup = 'Case Management';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('nama_pengadilan')
                ->label('Court Name')
                ->required()
                ->placeholder('Enter the court name'),
            Forms\Components\Select::make('mahasiswa_id')
                ->label('Student')
                ->relationship('mahasiswa', 'name')
                ->required(),
            Forms\Components\Select::make('pembiayaan_id')
                ->label('Funding')
                ->relationship('pembiayaanperkara', 'name')
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('nama_pengadilan')
                ->label('Court Name')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('mahasiswa.name')
                ->label('Student')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('pembiayaanperkara.name')
                ->label('Funding')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('created_at')
                ->label('Created At')
                ->dateTime()
                ->sortable(),
        ])
        ->filters([
            Tables\Filters\SelectFilter::make('mahasiswa_id')
                ->label('Student')
                ->relationship('mahasiswa', 'name'),
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPendaftaranSidangs::route('/'),
            'create' => Pages\CreatePendaftaranSidang::route('/create'),
            'edit' => Pages\EditPendaftaranSidang::route('/{record}/edit'),
        ];
    }
}