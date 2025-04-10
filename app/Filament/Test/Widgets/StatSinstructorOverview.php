<?php

namespace App\Filament\Test\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

use App\Models\DokumenPermohonan;
use App\Models\PersetujuanPihak;
use App\Models\Mahasiswa;

class StatSinstructorOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $dokumenPermohonanCount = DokumenPermohonan::count();
        $persetujuanPihakCount = PersetujuanPihak::count();
        $mahasiswaCount = Mahasiswa::count();

        return [
            Stat::make('Request Document from the Database', $dokumenPermohonanCount)
                ->description('Total Request Documents')
                ->descriptionIcon('heroicon-m-document-text')
                ->color('info')
                ->chart([$dokumenPermohonanCount]),
            Stat::make('Approval Parties from the Database', $persetujuanPihakCount)
                ->description('Total Approval Parties')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success')
                ->chart([$persetujuanPihakCount]),
            Stat::make('Students from the Database', $mahasiswaCount)
                ->description('Total Students Registered')
                ->descriptionIcon('heroicon-m-users')
                ->color('warning')
                ->chart([$mahasiswaCount]),
        ];
    }
}
