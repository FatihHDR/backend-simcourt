<?php

namespace App\Filament\Test\Resources\StudentGroupResource\Pages;

use App\Filament\Test\Resources\StudentGroupResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateStudentGroup extends CreateRecord
{
    protected static string $resource = StudentGroupResource::class;
}
