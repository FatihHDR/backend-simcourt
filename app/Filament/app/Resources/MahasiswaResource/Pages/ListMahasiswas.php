<?php

namespace App\Filament\App\Resources\MahasiswaResource\Pages;

use App\Filament\App\Resources\MahasiswaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Tab;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Mahasiswa;

class ListMahasiswas extends ListRecords
{
    protected static string $resource = MahasiswaResource::class;

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
                ->badge(Mahasiswa::count()), // Count of all students
            'This Week' => Tab::make()
                ->modifyQueryUsing(function (Builder $query) {
                    return $query->where('created_at', '>=', now()->subWeek());
                })
                ->badge(Mahasiswa::where('created_at', '>=', now()->subWeek())->count()), // Count for this week
            'This Month' => Tab::make()
                ->modifyQueryUsing(function (Builder $query) {
                    return $query->where('created_at', '>=', now()->subMonth());
                })
                ->badge(Mahasiswa::where('created_at', '>=', now()->subMonth())->count()), // Count for this month
            'This Year' => Tab::make()
                ->modifyQueryUsing(function (Builder $query) {
                    return $query->where('created_at', '>=', now()->subYear());
                })
                ->badge(Mahasiswa::where('created_at', '>=', now()->subYear())->count()), // Count for this year
        ];
    }
}
