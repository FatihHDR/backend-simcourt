<?php

namespace App\Filament\Resources\PendaftaranPermohonanResource\Pages;

use App\Filament\Resources\PendaftaranPermohonanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Tab;
use Illuminate\Database\Eloquent\Builder;
use App\Models\PendaftaranPermohonan;

class ListPendaftaranPermohonans extends ListRecords
{
    protected static string $resource = PendaftaranPermohonanResource::class;

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
                ->badge(PendaftaranPermohonan::count()), // Count of all registrations
            'This Week' => Tab::make()
                ->modifyQueryUsing(function (Builder $query) {
                    return $query->where('created_at', '>=', now()->subWeek());
                })
                ->badge(PendaftaranPermohonan::where('created_at', '>=', now()->subWeek())->count()), // Count for this week
            'This Month' => Tab::make()
                ->modifyQueryUsing(function (Builder $query) {
                    return $query->where('created_at', '>=', now()->subMonth());
                })
                ->badge(PendaftaranPermohonan::where('created_at', '>=', now()->subMonth())->count()), // Count for this month
            'This Year' => Tab::make()
                ->modifyQueryUsing(function (Builder $query) {
                    return $query->where('created_at', '>=', now()->subYear());
                })
                ->badge(PendaftaranPermohonan::where('created_at', '>=', now()->subYear())->count()), // Count for this year
        ];
    }
}