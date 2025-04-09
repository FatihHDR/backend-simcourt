<?php

namespace App\Filament\Test\Resources\PersetujuanPihakResource\Pages;

use App\Filament\Test\Resources\PersetujuanPihakResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPersetujuanPihak extends EditRecord
{
    protected static string $resource = PersetujuanPihakResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
