<?php

namespace App\Filament\Tenant\Resources\Shops\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Support\Icons\Heroicon;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Flex;
use Filament\Infolists\Components\IconEntry;
use Filament\Actions\Action;
use App\Services\WalletService;


class ShopForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Tabs')
                ->tabs([
                    Tab::make('Tab 1')
                        ->label(__('General Settings'))
                        ->icon(Heroicon::AdjustmentsVertical)
                        ->schema([
                            TextInput::make('name')
                                ->required(),
                            TextInput::make('slug')
                                ->required(),
                            TextInput::make('email')
                                ->label('Email address')
                                ->email(),
                            TextInput::make('phone')
                                ->tel(),
                            TextInput::make('street'),
                            TextInput::make('city'),
                            TextInput::make('state'),
                            TextInput::make('postal_code'),
                            TextInput::make('website'),
                            Toggle::make('is_active')
                                ->required(),
                        ]),
                    Tab::make('Tab 2')
                        ->label(__('Billing'))
                        ->icon(Heroicon::CreditCard)
                        ->schema([
                            Flex::make([
                                Section::make([
                                    
                                    //IconColumn::make('logo')->icon("heroicon-m-user-group")
                                ]),
                                Section::make([
                                            TextInput::make('wallet_balance')
                                                ->label('Wallet Balance')
                                                ->prefix('$')
                                                ->disabled()
                                                ->suffixAction(
                                                    Action::make('updateBalance')
                                                        ->icon('heroicon-o-banknotes')
                                                        ->color('success')
                                                        ->form([
                                                            Select::make('type')
                                                                ->label(__('Action'))
                                                                ->options(['debit'=>_('Debit'), 'credit'=> __('Credit')])
                                                                ->required(),
                                                            TextInput::make('amount')
                                                                ->numeric()
                                                                ->required()
                                                                ->label(__('Amount')),
                                                            TextInput::make('comment')
                                                                ->label(__('Comment')),
                                                        ])
                                                        ->action(function (array $data, $record) {
                                                            $type = isset($data['type']) ?  $data['type'] : null;
                                                            $comment = isset($data['comment']) ?  $data['comment'] : null;
                                                            $walletService = new WalletService();
                                                            $done = false;
                                                            if($type == 'debit') {
                                                                $record->wallet_balance -= $data['amount'];
                                                                $done = $walletService->debit($record, $record->wallet_balance, 'order-123', $comment ?? 'Purchase made');
                                                            }
                                                            if($type == 'credit') {
                                                                $record->wallet_balance += $data['amount'];
                                                                $done = $walletService->credit($record, $record->wallet_balance, 'manual-fund', $comment ?? 'Tenant funded wallet');
                                                            }
                                                            if($done) $record->save();

                                                            
                                                        })
                                                )
                                ])->grow(false),
                            ])->from('md')
                        ]),
                    Tab::make('Tab 2')
                        ->label(__('Services'))
                        ->icon(Heroicon::ServerStack)
                        ->schema([
                            // ...
                        ]),
                    Tab::make('Tab 3')
                        ->label(__('Payment Logs'))
                        ->icon(Heroicon::Banknotes)
                        ->schema([
                            // ...
                        ]),
                    Tab::make('Tab 3')
                        ->label(__('Users'))
                        ->icon(Heroicon::Users)
                        ->schema([
                            // ...
                        ]),
                    Tab::make('Tab 3')
                        ->label(__('Charts'))
                        ->icon(Heroicon::ChartBar)
                        ->schema([
                            // ...
                        ]),
                ])
                ->extraAttributes([
                    'class' => 'px-6 py-3 text-lg font-medium space-x-6', //adds horizontal space between tab labels
                ])
                ->columnSpanFull(), // Make tabs stretch full width
            ]);
    }
}

/*
                TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                TextInput::make('country_id')
                    ->numeric(),
                TextInput::make('time_zone_id')
                    ->numeric(),
                TextInput::make('currency_id')
                    ->numeric(),
                

                    */