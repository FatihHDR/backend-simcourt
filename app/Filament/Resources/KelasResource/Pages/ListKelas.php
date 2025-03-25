<?php

namespace App\Filament\Resources\KelasResource\Pages;

use App\Filament\Resources\KelasResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Tab;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Kelas;

class ListKelas extends ListRecords
{
    protected static string $resource = KelasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'All' => Tab::make()
                ->modifyQueryUsing(function (Builder $query) {
                    return $query; // No filtering for 'All'
                })
                ->badge(Kelas::count()), // Count of all classes
            'This Week' => Tab::make()
                ->modifyQueryUsing(function (Builder $query) {
                    return $query->where('created_at', '>=', now()->subWeek());
                })
                ->badge(Kelas::where('created_at', '>=', now()->subWeek())->count()), // Count for this week
            'This Month' => Tab::make()
                ->modifyQueryUsing(function (Builder $query) {
                    return $query->where('created_at', '>=', now()->subMonth());
                })
                ->badge(Kelas::where('created_at', '>=', now()->subMonth())->count()), // Count for this month
            'This Year' => Tab::make()
                ->modifyQueryUsing(function (Builder $query) {
                    return $query->where('created_at', '>=', now()->subYear());
                })
                ->badge(Kelas::where('created_at', '>=', now()->subYear())->count()), // Count for this year
        ];
    }
}