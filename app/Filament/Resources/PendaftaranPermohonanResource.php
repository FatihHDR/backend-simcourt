<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PendaftaranPermohonanResource\Pages;
use App\Models\PendaftaranPermohonan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PendaftaranPermohonanResource extends Resource
{
    protected static ?string $model = PendaftaranPermohonan::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Request Registrations';
    protected static ?string $modelLabel = 'Request Registration';
    protected static ?string $navigationGroup = 'Case Management';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('group_id')
                ->label('Group')
                ->relationship('group', 'name')
                ->required(),
            Forms\Components\Select::make('class_id')
                ->label('Class')
                ->relationship('class', 'name')
                ->required(),
            Forms\Components\TextInput::make('persidangan_id')
                ->label('Court Session ID')
                ->required()
                ->placeholder('Enter court session ID'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('group.name')
                ->label('Group')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('class.name')
                ->label('Class')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('persidangan_id')
                ->label('Court Session ID')
                ->sortable(),
            Tables\Columns\TextColumn::make('created_at')
                ->label('Created At')
                ->dateTime()
                ->sortable(),
        ])
        ->filters([
            Tables\Filters\SelectFilter::make('group_id')
                ->label('Group')
                ->relationship('group', 'name'),
            Tables\Filters\SelectFilter::make('class_id')
                ->label('Class')
                ->relationship('class', 'name'),
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListPendaftaranPermohonans::route('/'),
            'create' => Pages\CreatePendaftaranPermohonan::route('/create'),
            'edit' => Pages\EditPendaftaranPermohonan::route('/{record}/edit'),
        ];
    }
}