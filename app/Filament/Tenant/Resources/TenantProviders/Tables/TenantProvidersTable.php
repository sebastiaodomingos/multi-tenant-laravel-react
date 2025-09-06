<?php

namespace App\Filament\Tenant\Resources\TenantProviders\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class TenantProvidersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label(__('Avatar')),
                TextColumn::make('name')
                    ->label(__('Provider'))
                    ->searchable(),
                IconColumn::make('enabled')
                    ->label(__('Enabled'))
                    ->boolean(),
                TextColumn::make('status')
                    ->label(__('Status'))
                    ->searchable(),
                TextColumn::make('type')
                    ->searchable(),
                IconColumn::make('test_mode')
                    ->label(__('Test Mode'))
                    ->boolean(),
                TextColumn::make('updated_at')
                    ->label(__('Last Updated'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //DeleteBulkAction::make(),
                ]),
            ])->modifyQueryUsing(fn (Builder $query) => 
                $query->where('tenant_id', auth()->user()->tenant_id)
            );
    }
}
