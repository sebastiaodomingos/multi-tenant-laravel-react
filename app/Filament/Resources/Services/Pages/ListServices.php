<?php

namespace App\Filament\Resources\Services\Pages;

use App\Filament\Resources\Services\ServiceResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use App\Models\Service;

use Filament\Infolists\Infolist;

class ListServices extends ListRecords
{
    protected static string $resource = ServiceResource::class;
    protected string $view = 'filament.resources.services.pages.services-list';

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
    public function getServices()
    {
        return Service::all();
    }
    public function getInfolist(): Infolist
    {
        $infolist = ServiceResource::infolist(app(Infolist::class));
        // Load services into RepeatableEntry
        $infolist->getComponent('services')->state(
            Service::all()->map(fn($s) => $s->toArray())->toArray()
        );

        return $infolist;
    }
}
