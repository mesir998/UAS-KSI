<?php

namespace App\Filament\Admin\Resources\SalarySlipResource\Pages;

use App\Filament\Admin\Resources\SalarySlipResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSalarySlips extends ListRecords
{
    protected static string $resource = SalarySlipResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
