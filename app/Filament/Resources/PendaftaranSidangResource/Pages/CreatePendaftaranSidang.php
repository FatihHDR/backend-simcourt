<?php

namespace App\Filament\Resources\PendaftaranSidangResource\Pages;

use App\Filament\Resources\PendaftaranSidangResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreatePendaftaranSidang extends CreateRecord
{
    protected static string $resource = PendaftaranSidangResource::class;

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
