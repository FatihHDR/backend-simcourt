<?php

namespace App\Filament\Resources\InstrukturResource\Pages;

use App\Filament\Resources\InstrukturResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateInstruktur extends CreateRecord
{
    protected static string $resource = InstrukturResource::class;

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Instruktur created.';
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->title('Instruktur created.')
            ->body('The instruktur has been created successfully.') // Use body() instead of message()
            ->icon('heroicon-o-check-circle')
            ->success(); // You can also use ->theme('success') if you prefer
    }
}