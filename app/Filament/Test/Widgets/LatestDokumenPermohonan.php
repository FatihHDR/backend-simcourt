<?php

namespace App\Filament\Test\Widgets;

use App\Models\DokumenPermohonan;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestDokumenPermohonan extends BaseWidget
{
    protected static ?string $heading = 'Latest Dokumen Permohonan';
    protected static ?int $sort = 3;


    public function table(Table $table): Table
    {
        return $table
            ->query(
                DokumenPermohonan::query()->latest('created_at')->limit(10) // Mengambil 10 dokumen terbaru
            )
            ->columns([
                Tables\Columns\TextColumn::make('diupload_oleh')
                    ->label('Uploaded By'),
                Tables\Columns\IconColumn::make('status')
                    ->label('Verified')
                    ->boolean(fn ($state) => $state === 'Terverifikasi') // Map "Terverifikasi" to true
                    ->trueIcon('heroicon-o-check-circle') // Icon for true
                    ->falseIcon('heroicon-o-x-circle') // Icon for false
                    ->trueColor('success') // Color for true
                    ->falseColor('danger') // Color for false
                    ->getStateUsing(fn ($record) => $record->status === 'Terverifikasi'), // Ensure the correct state is used
            ]);
    }
}