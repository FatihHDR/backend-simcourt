<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class MahasiswaChart extends ChartWidget
{

    protected static ?string $heading = 'Students from the Database';
    protected static ?int $sort = 2;


    protected function getData(): array
    {
        $data = \App\Models\Mahasiswa::selectRaw('EXTRACT(MONTH FROM created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month');

        $monthNames = [
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'
        ];

        $labels = array_map(function($month) use ($monthNames) {
            return $monthNames[$month - 1];
        }, $data->keys()->toArray());

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Students Created',
                    'data' => $data->values(),
                    'borderColor' => 'Red',
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}

