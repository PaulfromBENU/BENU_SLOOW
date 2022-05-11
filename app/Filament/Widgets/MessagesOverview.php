<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

use Carbon\Carbon;

use App\Models\ContactMessage;

class MessagesOverview extends BaseWidget
{
    protected static ?string $pollingInterval = '30s';

    protected function getHeader(): string
    {
        return 'Messages';
    }

    protected function getCards(): array
    {
        return [
            Card::make('Unanswered user messages', ContactMessage::where('is_answered', '0')->where('closed', '0')->count())
            ->color('success'),
        ];
    }
}
