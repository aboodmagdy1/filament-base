<?php

namespace App\Filament\Resources\HomeSectionResource\Pages;

use App\Filament\Resources\HomeSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateHomeSection extends CreateRecord
{   
    use CreateRecord\Concerns\Translatable;
    protected static string $resource = HomeSectionResource::class;

    public function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }

    public function getTitle(): string
    {
        return __('Create Home Section');
    }
}