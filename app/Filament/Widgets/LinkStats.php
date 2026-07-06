<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Click;
use App\Models\Link;

class LinkStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make(
                'Мои ссылки',
                Link::where('user_id', auth()->id())->count()
            )->description('Всего создано коротких ссылок'),

            Stat::make(
                'Всего кликов',
                Click::whereHas('link', fn ($query) =>
                $query->where('user_id', auth()->id()))->count()
            )->description('Всего переходов по всем ссылкам'),

            Stat::make(
                'Самая популярная ссылка',
                ($link = Link::where('user_id', auth()->id())
                    ->withCount('clicks')
                    ->orderByDesc('clicks_count')
                    ->first()) ? $link->short_code : '-'
            )
                ->description($link ? "Кликов: {$link->clicks_count}" : 0)
                ->url($link ? url($link->short_code) : null)
                ->openUrlInNewTab(),
        ];
    }
}
