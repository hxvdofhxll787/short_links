<?php

namespace App\Filament\Resources\LinkResource\Pages;

use App\Filament\Resources\LinkResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;
use \App\Models\Link;

class CreateLink extends CreateRecord
{
    protected static string $resource = LinkResource::class;

    protected function changeFormData(array $data): array {
        $data['short_code'] = $this->generateCode();
        $data['user_id'] = auth()->id();

        return $data;
    }

    private function generateCode(): string {
        do {
            $code = Str::random(6);
        } while (Link::where('short_code', $code)->exists());

        return $code;
    }
}
