<?php

namespace App\Filament\Resources\TeacherDataResource\Pages;

use App\Filament\Resources\TeacherDataResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTeacherData extends ListRecords
{
    protected static string $resource = TeacherDataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
