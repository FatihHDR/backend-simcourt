<?php

namespace App\Filament\Widgets;

use App\Models\Instruktur;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestInstruktur extends BaseWidget
{
    protected static ?string $heading = 'Latest Instructors';
    protected static ?int $sort = 3;

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Instruktur::query()->latest('created_at')->limit(10) // Mengambil 10 instruktur terbaru
            )
            ->columns([
                Tables\Columns\TextColumn::make('nip')
                    ->label('NIP')
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Name')
                    ->sortable(),
            ]);
    }
}