<?php

namespace App\Filament\Test\Resources\DokumenPermohonanResource\Pages;

use App\Filament\Test\Resources\DokumenPermohonanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDokumenPermohonans extends ListRecords
{
    protected static string $resource = DokumenPermohonanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
