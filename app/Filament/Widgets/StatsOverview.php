<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

use Carbon\Carbon;

use App\Models\Opening;
use App\Models\Reservation;
use App\Models\User;

class StatsOverview extends BaseWidget
{
    protected static ?string $pollingInterval = '30s';

    protected function getCards(): array
    {
        $number_of_days = 7;

        // Compute data evolution for chart display
        $last_users_count = [];
        $valid_reservations_count = [];
        $pending_reservations_count = [];

        for ($i=$number_of_days; $i >= 0; $i--) { 
            array_push($last_users_count, User::where('created_at', '<', Carbon::now()->subDays($i))->count());
            array_push($valid_reservations_count, Reservation::where('created_at', '<', Carbon::now()->subDays($i))->where('valid', '1')->count());
            array_push($pending_reservations_count, Reservation::where('created_at', '<', Carbon::now()->subDays($i))->where('valid', '0')->count());
        }

        // Trends evaluation
        $users_last_period = User::where('created_at', '>', Carbon::now()->subDays($number_of_days))->where('created_at', '<=', Carbon::now())->count();
        $users_previous_period = User::where('created_at', '>', Carbon::now()->subDays($number_of_days * 2))->where('created_at', '<=', Carbon::now()->subDays($number_of_days))->count();
        $users_delta = $users_last_period - $users_previous_period;
        if ($users_delta < 0) {
            $users_icon = 'heroicon-s-trending-down';
            $user_color = 'danger';
        } elseif ($users_delta > 0) {
            $users_icon = 'heroicon-s-trending-up';
            $user_color = 'success';
        } else {
            $users_icon = 'heroicon-s-arrow-narrow-right';
            $user_color = 'warning';
        }

        return [
            Card::make('Number of users registered', User::count())
            ->description('Over 8 days')
            ->descriptionIcon($users_icon)
            ->chart($last_users_count)
            ->color($user_color),
            Card::make('Valid reservations', Reservation::whereHas('opening', function ($query) {
                $query->where('date', '>=', Carbon::now());
            })->where('valid', '1')->count())
            ->description('Over 8 days')
            ->descriptionIcon('heroicon-s-trending-up')
            ->chart($valid_reservations_count)
            ->color('success'),
            Card::make('Pending reservations', Reservation::whereHas('opening', function ($query) {
                $query->where('date', '>=', Carbon::now());
            })->where('valid', '0')->count())
            ->description('Over 8 days')
            ->descriptionIcon('heroicon-s-trending-up')
            ->chart($pending_reservations_count)
            ->color('success'),
        ];
    }
}
