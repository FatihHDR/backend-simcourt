<?php

namespace App\Filament\Widgets;

use App\Models\Mahasiswa;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestMahasiswa extends BaseWidget
{
    protected static ?string $heading = 'Latest Students';
    protected static ?int $sort = 3;


    public function table(Table $table): Table
    {
        return $table
            ->query(
                Mahasiswa::query()->latest('created_at')->limit(10) // Mengambil 10 mahasiswa terbaru
            )
            ->columns([
                Tables\Columns\TextColumn::make('nim')
                    ->label('NIM')
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Name')
                    ->sortable(),
            ]);
    }
}