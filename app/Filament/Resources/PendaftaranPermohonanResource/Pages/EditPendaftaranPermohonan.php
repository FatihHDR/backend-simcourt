<?php

namespace App\Filament\Resources\PendaftaranPermohonanResource\Pages;

use App\Filament\Resources\PendaftaranPermohonanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPendaftaranPermohonan extends EditRecord
{
    protected static string $resource = PendaftaranPermohonanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
