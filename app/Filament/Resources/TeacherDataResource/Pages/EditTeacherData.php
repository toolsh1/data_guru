<?php

namespace App\Filament\Resources\TeacherDataResource\Pages;

use App\Filament\Resources\TeacherDataResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTeacherData extends EditRecord
{
    protected static string $resource = TeacherDataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
