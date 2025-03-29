<?php

namespace App\Filament\App\Resources\PersetujuanPihakResource\Pages;

use App\Filament\App\Resources\PersetujuanPihakResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPersetujuanPihaks extends ListRecords
{
    protected static string $resource = PersetujuanPihakResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
