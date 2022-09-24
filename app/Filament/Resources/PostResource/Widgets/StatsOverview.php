<?php

namespace App\Filament\Resources\PostResource\Widgets;

use App\Models\Post;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('All Posts', Post::count()),
            Card::make('Published Posts', Post::where('is_published', true)->count()),
            Card::make('Unpublished Posts', Post::where('is_published', false)->count())
        ];
    }
}
