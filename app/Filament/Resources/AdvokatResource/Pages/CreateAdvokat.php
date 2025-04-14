<?php

namespace App\Filament\Resources\AdvokatResource\Pages;

use App\Filament\Resources\AdvokatResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreateAdvokat extends CreateRecord
{
    protected static string $resource = AdvokatResource::class;

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Advocate Created.';
    }
    
    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->title('Advocate Created.')
            ->body('The Advocate has been created successfully.')
            ->icon('heroicon-o-check-circle')
            ->success();
    }
}
