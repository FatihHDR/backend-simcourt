<?php

namespace App\Filament\Resources\KelasResource\Pages;

use App\Filament\Resources\KelasResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreateKelas extends CreateRecord
{
    protected static string $resource = KelasResource::class;
    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Class created.';
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->title('Class Created.')
            ->body('The Class has been created successfully.')
            ->icon('heroicon-o-check-circle')
            ->success();
    }
}
