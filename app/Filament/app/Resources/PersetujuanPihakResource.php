<?php

namespace App\Filament\App\Resources;

use App\Filament\App\Resources\PersetujuanPihakResource\Pages;
use App\Filament\App\Resources\PersetujuanPihakResource\RelationManagers;
use App\Models\PersetujuanPihak;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PersetujuanPihakResource extends Resource
{
    protected static ?string $model = PersetujuanPihak::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Approval Parties';
    protected static ?string $modelLabel = 'Approval Party';
    protected static ?string $navigationGroup = 'Case Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('pihak_id')
                    ->label('Party')
                    ->relationship('pihak', 'name')
                    ->required(),
                Forms\Components\Select::make('persetujuan')
                    ->label('Approval')
                    ->options([
                        'setuju' => 'Agree',
                        'tidak_setuju' => 'Disagree',
                        'belum_membuat' => 'Not Made Yet',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('pihak.name')
                    ->label('Party')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('persetujuan')
                    ->label('Approval')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created At')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('persetujuan')
                    ->label('Approval')
                    ->options([
                        'setuju' => 'Agree',
                        'tidak_setuju' => 'Disagree',
                        'belum_membuat' => 'Not Made Yet',
                    ]),
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
            'index' => Pages\ListPersetujuanPihaks::route('/'),
            'create' => Pages\CreatePersetujuanPihak::route('/create'),
            'edit' => Pages\EditPersetujuanPihak::route('/{record}/edit'),
        ];
    }
}