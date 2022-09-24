<?php

namespace App\Filament\Resources\CommentResource\Widgets;

use Carbon\Carbon;
use App\Models\Comment;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('All Comments', Comment::count()),
            Card::make("Today's Comments", Comment::where('created_at', '>=', Carbon::today())->count()),
            Card::make('Weekly Comments', Comment::whereBetween(
                'created_at',
                [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]
            )->count())
        ];
    }
}