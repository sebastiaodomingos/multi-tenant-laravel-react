<?php

namespace App\Filament\Resources\Services\Pages;

use App\Filament\Resources\Services\ServiceResource;
use Filament\Resources\Pages\Concerns\InteractsWithRecord;
use Filament\Resources\Pages\Page;

class ServicesList extends Page
{
    use InteractsWithRecord;

    protected static string $resource = ServiceResource::class;

    protected string $view = 'filament.resources.services.pages.services-list';

    public function mount(int|string $record): void
    {
        $this->record = $this->resolveRecord($record);
    }
}
