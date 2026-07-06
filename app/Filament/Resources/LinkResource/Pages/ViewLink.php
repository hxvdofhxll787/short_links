<?php

namespace App\Filament\Resources\LinkResource\Pages;

use App\Filament\Resources\LinkResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use App\Filament\Resources\LinkResource\RelationManagers\ClicksRelationManager;
use Filament\Infolists;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\TextEntry;
use App\Models\Click;

class ViewLink extends ViewRecord
{
    protected static string $resource = LinkResource::class;

    public function getRelations(): array
    {
        return [
            ClicksRelationManager::class,
        ];
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                TextEntry::make('original_url')
                    ->label('Оригинальный URL:')
                    ->url(fn($record) => $record->original_url)
                    ->openUrlInNewTab(),

                TextEntry::make('short_code')
                    ->label('Короткая ссылка:')
                    ->formatStateUsing(fn($state) => url($state))
                    ->url(fn($record) => url($record->short_code))
                    ->openUrlInNewTab(),
            ]);
    }
}
