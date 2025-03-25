<?php

namespace App\Filament\Resources\PendaftaranSidangResource\Pages;

use App\Filament\Resources\PendaftaranSidangResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Tab;
use Illuminate\Database\Eloquent\Builder;
use App\Models\PendaftaranSidang;

class ListPendaftaranSidangs extends ListRecords
{
    protected static string $resource = PendaftaranSidangResource::class;

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
                ->badge(PendaftaranSidang::count()), // Count of all registrations
            'This Week' => Tab::make()
                ->modifyQueryUsing(function (Builder $query) {
                    return $query->where('created_at', '>=', now()->subWeek());
                })
                ->badge(PendaftaranSidang::where('created_at', '>=', now()->subWeek())->count()), // Count for this week
            'This Month' => Tab::make()
                ->modifyQueryUsing(function (Builder $query) {
                    return $query->where('created_at', '>=', now()->subMonth());
                })
                ->badge(PendaftaranSidang::where('created_at', '>=', now()->subMonth())->count()), // Count for this month
            'This Year' => Tab::make()
                ->modifyQueryUsing(function (Builder $query) {
                    return $query->where('created_at', '>=', now()->subYear());
                })
                ->badge(PendaftaranSidang::where('created_at', '>=', now()->subYear())->count()), // Count for this year
        ];
    }
}