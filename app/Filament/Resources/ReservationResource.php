<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReservationResource\Pages;
use App\Models\Reservation;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;

class ReservationResource extends Resource
{
    protected static ?string $model = Reservation::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            //
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nom')->searchable(),
                TextColumn::make('email'),
                TextColumn::make('telephone'),
                TextColumn::make('date')->searchable(), 
                TextColumn::make('heure'),
                TextColumn::make('status')
                    ->badge()
                    ->colors([
                        'warning' => 'en attente',
                        'success' => 'confirmée',  
                        'danger'  => 'annulée',
                    ]),
            ])
            
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'en attente' => 'En attente',
                        'confirmée'  => 'Confirmée',
                        'annulée'    => 'Annulée',
                    ]),
            ])
            
            ->actions([
                Tables\Actions\Action::make('confirmer')
        ->label('Confirmer')
        ->color('success')
        ->icon('heroicon-o-check')
        ->visible(fn ($record) => $record->status === 'en attente')
        ->action(function ($record) {
            $record->update(['status' => 'confirmée']);
        }),

    Tables\Actions\Action::make('annuler')
        ->label('Annuler')
        ->color('danger')
        ->icon('heroicon-o-x-mark')
        ->visible(fn ($record) => $record->status !== 'annulée')
        ->action(function ($record) {
            $record->update(['status' => 'annulée']);
        }),
            ])
            
            ->bulkActions([
                BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListReservations::route('/'),
            'create' => Pages\CreateReservation::route('/create'),
            'edit' => Pages\EditReservation::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return false; 
    }
}
