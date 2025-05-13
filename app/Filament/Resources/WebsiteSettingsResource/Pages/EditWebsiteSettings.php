<?php

namespace App\Filament\Resources\WebsiteSettingsResource\Pages;

use App\Filament\Resources\WebsiteSettingsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWebsiteSettings extends EditRecord
{
    protected static string $resource = WebsiteSettingsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
