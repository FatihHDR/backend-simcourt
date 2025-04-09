<?php

namespace App\Filament\Test\Resources\StudentGroupResource\Pages;

use App\Filament\Test\Resources\StudentGroupResource;
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
