<?php

namespace App\Filament\App\Resources\PersetujuanPihakResource\Pages;

use App\Filament\App\Resources\PersetujuanPihakResource;
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
