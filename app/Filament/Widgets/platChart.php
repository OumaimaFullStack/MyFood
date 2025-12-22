<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Categorie;

class PlatChart extends ChartWidget
{
    protected static ?string $heading = 'Plats par catégorie';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Nombre de plats',
                    'data' => Categorie::withCount('plats')->pluck('plats_count'),
                    'backgroundColor' => '#e29609ff'
                ],
            ],
            'labels' => Categorie::pluck('nom'),
        ];
    }

    protected function getType():string
    {
        return 'bar';
    }
}
