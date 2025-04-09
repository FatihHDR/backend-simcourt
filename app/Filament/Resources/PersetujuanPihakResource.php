<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PersetujuanPihakResource\Pages;
use App\Filament\Resources\PersetujuanPihakResource\RelationManagers;
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

    protected static ?string $navigationIcon = 'heroicon-o-scale';
    protected static ?string $navigationLabel = 'Approval Parties';
    protected static ?string $modelLabel = 'Approval Party';
    protected static ?string $navigationGroup = 'Case Management';

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('pihak.nama_lengkap')
                    ->label('Nama Siswa')
                    ->searchable()
                    ->sortable(),
    
                Tables\Columns\TextColumn::make('team.name')
                    ->label('Team')
                    ->sortable(),
            ])
            ->filters([
                // Tambahkan filter jika diperlukan
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListPersetujuanPihaks::route('/'),
            'create' => Pages\CreatePersetujuanPihak::route('/create'),
            'edit' => Pages\EditPersetujuanPihak::route('/{record}/edit'),
        ];
    }
}
