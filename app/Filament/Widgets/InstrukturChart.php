<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Instruktur;

class InstrukturChart extends ChartWidget
{
    protected static ?string $heading = 'Instructors from the Database';
    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $data = Instruktur::selectRaw('EXTRACT(MONTH FROM created_at) as month, COUNT(*) as count')

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
                    'label' => 'Instructors Created',
                    'data' => $data->values(),
                    'backgroundColor' => 'Red',
                    'borderColor' => 'Red',
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}


