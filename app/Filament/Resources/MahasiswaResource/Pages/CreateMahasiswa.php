<?php

namespace App\Filament\Resources\MahasiswaResource\Pages;

use App\Filament\Resources\MahasiswaResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreateMahasiswa extends CreateRecord
{
    protected static string $resource = MahasiswaResource::class;

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Students Updated.';
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->title('Student Updated.')
            ->body('The Student has been updated successfully.')
            ->icon('heroicon-o-check-circle')
            ->success();
    }
}
