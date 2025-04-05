<?php

namespace App\Filament\App\Resources\PersetujuanPihakResource\Pages;

use App\Filament\App\Resources\PersetujuanPihakResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Tab;
use Illuminate\Database\Eloquent\Builder;
use App\Models\PersetujuanPihak;

class ListPersetujuanPihaks extends ListRecords
{
    protected static string $resource = PersetujuanPihakResource::class;

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
                    return $query; // Tidak ada filter untuk semua data
                })
                ->badge(PersetujuanPihak::count()), // Jumlah semua data

            'Setuju' => Tab::make()
                ->modifyQueryUsing(function (Builder $query) {
                    return $query->where('persetujuan', 'setuju');
                })
                ->badge(PersetujuanPihak::where('persetujuan', 'setuju')->count()), // Jumlah data dengan persetujuan "setuju"

            'Tidak Setuju' => Tab::make()
                ->modifyQueryUsing(function (Builder $query) {
                    return $query->where('persetujuan', 'tidak_setuju');
                })
                ->badge(PersetujuanPihak::where('persetujuan', 'tidak_setuju')->count()), // Jumlah data dengan persetujuan "tidak_setuju"

            'Belum Membuat' => Tab::make()
                ->modifyQueryUsing(function (Builder $query) {
                    return $query->where('persetujuan', 'belum_membuat');
                })
                ->badge(PersetujuanPihak::where('persetujuan', 'belum_membuat')->count()), // Jumlah data dengan persetujuan "belum_membuat"
        ];
    }
}
