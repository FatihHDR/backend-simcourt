<?php

namespace App\Filament\Resources\GroupResource\Pages;

use App\Filament\Resources\GroupResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreateGroup extends CreateRecord
{
    protected static string $resource = GroupResource::class;
    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Group Created.';
    }
    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->title('Group Created.')
            ->body('The group has been created successfully.')
            ->icon('heroicon-o-check-circle')
            ->success();
    }
}
