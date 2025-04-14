<?php

namespace App\Filament\Resources\PendaftaranPermohonanResource\Pages;

use App\Filament\Resources\PendaftaranPermohonanResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreatePendaftaranPermohonan extends CreateRecord
{
    protected static string $resource = PendaftaranPermohonanResource::class;

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Request Registration Created.';
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->title('Request Registration Created.')
            ->body('The Request Registration has been created successfully.')
            ->icon('heroicon-o-check-circle')
            ->success();
    }
}
