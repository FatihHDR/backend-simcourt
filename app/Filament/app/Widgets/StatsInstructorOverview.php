<?php

namespace App\Filament\App\Widgets;

use App\Models\Mahasiswa;
use App\Models\DokumenPermohonan;
use App\Models\PersetujuanPihak;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsInstructorOverview extends BaseWidget
{
    public function getStats(): array
    {
        $studentCount = Mahasiswa::count();
        $documentCount = DokumenPermohonan::count();
        $approvalCount = PersetujuanPihak::count();

        return [
            Stat::make('Students from the Database', $studentCount)
                ->description('Students')
                ->descriptionIcon('heroicon-m-users')
                ->color('warning')
                ->chart([$studentCount]),
            Stat::make('Documents from the Database', $documentCount)
                ->description('Documents')
                ->descriptionIcon('heroicon-m-document')
                ->color('primary')
                ->chart([$documentCount]),
            Stat::make('Approvals from the Database', $approvalCount)
                ->description('Approvals')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('info')
                ->chart([$approvalCount]),
        ];
    }
}
