<?php

namespace App\Filament\Widgets;

use App\Models\Reservation;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class ReservationChart extends ChartWidget
{
    protected static ?string $heading = 'Réservations par mois';

    protected function getData(): array
    {
        $reservationParMois = Reservation::select(
                DB::raw('MONTH(created_at) as mois'),
                DB::raw('COUNT(*) as total')
            )
            ->groupBy('mois')
            ->orderBy('mois')
            ->pluck('total','mois'); // clé = mois, valeur = total

        $labels = ['Jan', 'Fév', 'Mars', 'Avr', 'Mai', 'Juin', 'Juil', 'Août', 'Sep', 'Oct', 'Nov', 'Déc'];

        $data = [];
        foreach (range(1, 12) as $m) {
            $data[] = $reservationParMois[$m] ?? 0;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Nombre de réservations',
                    'data' => $data,
                    'backgroundColor' => '#e29609ff', // orange
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
