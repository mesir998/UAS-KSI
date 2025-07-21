<?php

namespace App\Filament\Admin\Resources\MatchModelResource\Pages;

use App\Filament\Admin\Resources\MatchModelResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMatchModel extends EditRecord
{
    protected static string $resource = MatchModelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
