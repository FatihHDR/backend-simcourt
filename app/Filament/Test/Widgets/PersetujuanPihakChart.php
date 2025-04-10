<?php

namespace App\Filament\Test\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\PersetujuanPihak;

class PersetujuanPihakChart extends ChartWidget
{
    protected static ?string $heading = 'Persetujuan Pihak Chart';
    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $data = PersetujuanPihak::selectRaw('persetujuan, COUNT(*) as count')
            ->groupBy('persetujuan')
            ->pluck('count', 'persetujuan');

        $labels = [
            'setuju' => 'Accepted',
            'tidak_setuju' => 'Not Accepted',
            'belum_membuat' => 'Not Made Yet',
        ];

        return [
            'labels' => array_values($labels),
            'datasets' => [
                [
                    'label' => 'Approval Status',
                    'data' => [
                        $data->get('setuju', 0),
                        $data->get('tidak_setuju', 0),
                        $data->get('belum_membuat', 0),
                    ],
                    'borderColor' => 'Red', // Line color
                    'backgroundColor' => 'rgba(76, 175, 80, 0.2)', // Fill color under the line
                    'tension' => 0.4, // Smooth curve
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line'; // Using a line chart to represent the data
    }
}