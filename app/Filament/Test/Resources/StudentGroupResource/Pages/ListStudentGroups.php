<?php

namespace App\Filament\Test\Resources\StudentGroupResource\Pages;

use App\Filament\Test\Resources\StudentGroupResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStudentGroups extends ListRecords
{
    protected static string $resource = StudentGroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
