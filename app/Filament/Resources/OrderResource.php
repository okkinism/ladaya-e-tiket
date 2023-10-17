<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use App\Models\Ticket;
use Brick\Math\BigInteger;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('ticket_id')
                    ->relationship('tickets', 'title')
                    ->afterStateUpdated(function ($state, callable $get, callable $set) {
                        $ticket = Ticket::find($state);

                        if ($ticket) {
                            $set('price', (string) $ticket->price);
                            $quantity = intval($get('quantity'));
                            $total = intval($get('price')) * $quantity;
                            $stock = intval($get('stock'));
                            $remainingStock = $stock - $quantity;

                            $set('total_price', (string) ($total));
                            $set('quantity', (string) $remainingStock);
                        }
                    }),
                Forms\Components\TextInput::make('customer_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone')
                    ->numeric()
                    ->required()
                    ->maxLength(13),
                Forms\Components\TextInput::make('quantity')
                    ->numeric()
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $get, callable $set){
                        $quantity = intval($get('quantity'));
                        $total = intval($get('price')) * $quantity;
                        $set('total_price', (string) ($total));
                    }),
                Forms\Components\TextInput::make('total_price')
                    ->numeric(),
                Forms\Components\Select::make('status')
                    ->options([
                        'Paid' => 'Paid',
                        'Unpaid' => 'Unpaid',
                    ])
                    ->live()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('ticket_id'),
                Tables\Columns\TextColumn::make('customer_name'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('phone'),
                Tables\Columns\TextColumn::make('quantity'),
                Tables\Columns\TextColumn::make('total_price')->money('idr'),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Paid' => 'success',
                        'Unpaid' => 'warning',
                    })
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
