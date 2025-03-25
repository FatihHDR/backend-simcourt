<?php

namespace App\Filament\Widgets;

use App\Models\Instruktur;
use App\Models\Kelas;
use App\Models\Mahasiswa;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Carbon;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $instructorCount = Instruktur::count();
        $classCount = Kelas::count();
        $studentCount = Mahasiswa::count();

        return [
            Stat::make('Instructors from the Database', $instructorCount)
                ->description('Instructors')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('primary')
                ->chart([$instructorCount]),
            Stat::make('Classes from the Database', $classCount)
                ->description('Classes')
                ->descriptionIcon('heroicon-m-academic-cap')
                ->color('success')
                ->chart([$classCount]),
            Stat::make('Students from the Database', $studentCount)
                ->description('Students')
                ->descriptionIcon('heroicon-m-users')
                ->color('warning')
                ->chart([$studentCount]),
        ];
    }
}
