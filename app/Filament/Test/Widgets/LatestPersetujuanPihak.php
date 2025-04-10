<?php

namespace App\Filament\Test\Widgets;

use App\Models\PersetujuanPihak;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestPersetujuanPihak extends BaseWidget
{
    protected static ?string $heading = 'Latest Persetujuan Pihak';
    protected static ?int $sort = 3;

    public function table(Table $table): Table
    {
        return $table
            ->query(
                PersetujuanPihak::query()->latest('created_at')->limit(10) // Mengambil 10 data terbaru
            )
            ->columns([
                Tables\Columns\TextColumn::make('pihak.nama_lengkap')
                    ->label('Party'),
                Tables\Columns\IconColumn::make('persetujuan')
                    ->label('Approval')
                    ->icon(fn (string $state): string => match ($state) {
                        'setuju' => 'heroicon-o-check-circle', // Icon for "Agree"
                        'tidak_setuju' => 'heroicon-o-x-circle', // Icon for "Disagree"
                        'belum_membuat' => 'heroicon-o-question-mark-circle', // Icon for "Not Made Yet"
                        default => 'heroicon-o-question-mark-circle', // Default icon
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'setuju' => 'success', // Green for "Agree"
                        'tidak_setuju' => 'danger', // Red for "Disagree"
                        'belum_membuat' => 'warning', // Yellow for "Not Made Yet"
                        default => 'gray', // Default color
                    }),
            ]);
    }
}