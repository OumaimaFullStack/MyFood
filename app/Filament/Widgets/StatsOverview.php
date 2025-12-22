<?php

namespace App\Filament\Widgets;

use App\Models\Categorie;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Plat;
class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total des Plats',Plat::count()),
            Stat::make('Total des réservations',Categorie::count())
        ];
    }
}
