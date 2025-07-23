<?php

namespace App\Filament\Admin\Resources\GradeLogResource\Pages;

use App\Filament\Admin\Resources\GradeLogResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGradeLog extends EditRecord
{
    protected static string $resource = GradeLogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
