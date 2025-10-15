<?php

namespace App\Filament\Widgets;

use App\Models\Candidat;
use App\Models\User;
use App\Models\Vote;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total des membres', User::count())
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('danger'),

            Stat::make('Total des candidats', Candidat::count())
                ->chart([17, 12, 4, 9, 15, 4, 25])
                ->color('success'),

            Stat::make('Total des votes', Vote::count())
                ->chart([47, 12, 4, 37, 15, 58])
                ->color('primary'),
        ];
    }
}
