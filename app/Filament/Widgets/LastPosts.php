<?php

namespace App\Filament\Widgets;

use App\Models\Post;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use App\Filament\Resources\PostResource;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;

class LastPosts extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

    protected static ?int $sort = 3;

    public function getDefaultTableRecordsPerPageSelectOption(): int
    {
        return 5;
    }

    protected function getDefaultTableSortColumn(): ?string
    {
        return 'published_at';
    }

    protected function getDefaultTableSortDirection(): ?string
    {
        return 'desc';
    }

    protected function getTableQuery(): Builder
    {
        return PostResource::getEloquentQuery();
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('published_at')->date()->sortable(),
            TextColumn::make('title')->limit(50)->sortable()->searchable(),
            TextColumn::make('slug')->limit(50),
            TextColumn::make('user.name')->label('Author')->limit(50),
            SpatieMediaLibraryImageColumn::make('thumbnail')->collection('posts'),
            BooleanColumn::make('is_published')
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Tables\Actions\Action::make('open')
                ->url(fn (Post $record): string => PostResource::getUrl('edit', ['record' => $record])),
        ];
    }
}
