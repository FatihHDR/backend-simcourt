<?php

namespace App\Filament\Resources\LegalCaseResource\Pages;

use App\Filament\Resources\LegalCaseResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateLegalCase extends CreateRecord
{
    protected static string $resource = LegalCaseResource::class;

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Legal Case created.';
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->title('Legal Case Created.')
            ->body('The Legal Case has been created successfully.')
            ->icon('heroicon-o-check-circle')
            ->success();
    }
}
