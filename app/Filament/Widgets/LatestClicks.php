<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use App\Models\Click;
use Illuminate\Database\Eloquent\Builder;

class LatestClicks extends BaseWidget
{
    protected static ?string $heading = 'Последние переходы';

    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Click::whereHas('link', fn (Builder $query) =>
                $query->where('user_id', auth()->id())
                )->with('link')->latest()
            )
            ->columns([
                Tables\Columns\TextColumn::make('link.short_code')
                    ->label('Короткий URL')
                    ->formatStateUsing(fn ($state) => url($state))
                    ->copyable(),

                Tables\Columns\TextColumn::make('link.original_url')
                    ->label('Оригинальный URL')
                    ->limit(50)
                    ->copyable(),

                Tables\Columns\TextColumn::make('ip_address')
                    ->label('IP-адрес'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Дата')
                    ->dateTime('d.m.Y H:i:s'),
            ]);
    }
}
