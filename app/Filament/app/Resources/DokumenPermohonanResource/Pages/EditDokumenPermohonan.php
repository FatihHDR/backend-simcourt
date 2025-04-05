<?php

namespace App\Filament\App\Resources\DokumenPermohonanResource\Pages;

use App\Filament\App\Resources\DokumenPermohonanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDokumenPermohonan extends EditRecord
{
    protected static string $resource = DokumenPermohonanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
