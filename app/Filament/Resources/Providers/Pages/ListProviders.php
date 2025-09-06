<?php

namespace App\Filament\Resources\Providers\Pages;

use App\Filament\Resources\Providers\ProviderResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\Page;
use App\Models\Provider;
use Illuminate\Support\Facades\Auth;

class ListProviders extends ListRecords
{
    protected static string $resource = ProviderResource::class;

   /*
    public function getView(): string
    {
        return 'filament.icon-list'; // blade file
    }

    public function getProviders()
    {
        return Provider::query()
           // ->when(Auth::user()->role === 'admin', fn ($q) => $q->where('enabled', true))
            ->get();
    }
*/
    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
