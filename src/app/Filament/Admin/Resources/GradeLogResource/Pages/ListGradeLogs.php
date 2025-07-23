<?php

namespace App\Filament\Admin\Resources\GradeLogResource\Pages;

use App\Filament\Admin\Resources\GradeLogResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGradeLogs extends ListRecords
{
    protected static string $resource = GradeLogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
