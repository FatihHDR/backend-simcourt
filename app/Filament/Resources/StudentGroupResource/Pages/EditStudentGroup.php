<?php

namespace App\Filament\Resources\StudentGroupResource\Pages;

use App\Filament\Resources\StudentGroupResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStudentGroup extends EditRecord
{
    protected static string $resource = StudentGroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
