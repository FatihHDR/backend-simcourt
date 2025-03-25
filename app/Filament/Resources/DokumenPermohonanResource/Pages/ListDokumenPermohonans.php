<?php

namespace App\Filament\Resources\DokumenPermohonanResource\Pages;

use App\Filament\Resources\DokumenPermohonanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Tab;
use Illuminate\Database\Eloquent\Builder;
use App\Models\DokumenPermohonan;

class ListDokumenPermohonans extends ListRecords
{
    protected static string $resource = DokumenPermohonanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'All' => Tab::make()
                ->modifyQueryUsing(function (Builder $query) {
                    return $query; // No filtering for 'All'
                })
                ->badge(DokumenPermohonan::count()), // Count of all documents
            'Verified' => Tab::make()
                ->modifyQueryUsing(function (Builder $query) {
                    return $query->where('status', 'Terverifikasi');
                })
                ->badge(DokumenPermohonan::where('status', 'Terverifikasi')->count()), // Count of verified documents
            'Unverified' => Tab::make()
                ->modifyQueryUsing(function (Builder $query) {
                    return $query->where('status', 'Belum terverifikasi');
                })
                ->badge(DokumenPermohonan::where('status', 'Belum terverifikasi')->count()), // Count of unverified documents
            'This Week' => Tab::make()
                ->modifyQueryUsing(function (Builder $query) {
                    return $query->where('created_at', '>=', now()->subWeek());
                })
                ->badge(DokumenPermohonan::where('created_at', '>=', now()->subWeek())->count()), // Count for this week
            'This Month' => Tab::make()
                ->modifyQueryUsing(function (Builder $query) {
                    return $query->where('created_at', '>=', now()->subMonth());
                })
                ->badge(DokumenPermohonan::where('created_at', '>=', now()->subMonth())->count()), // Count for this month
        ];
    }
}