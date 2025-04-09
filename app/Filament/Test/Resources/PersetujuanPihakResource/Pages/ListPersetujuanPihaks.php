<?php

namespace App\Filament\Test\Resources\PersetujuanPihakResource\Pages;

use App\Filament\Test\Resources\PersetujuanPihakResource;
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
