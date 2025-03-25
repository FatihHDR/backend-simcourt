<?php

namespace App\Filament\Resources\DokumenPermohonanResource\Pages;

use App\Filament\Resources\DokumenPermohonanResource;
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
