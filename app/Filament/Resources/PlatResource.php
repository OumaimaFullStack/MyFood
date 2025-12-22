<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PlatResource\Pages;
use App\Filament\Resources\PlatResource\RelationManagers;
use App\Models\Plat;
use Dom\Text;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Forms\Components\Select;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class PlatResource extends Resource
{
    protected static ?string $model = Plat::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nom')
                ->required(),
                Textarea::make('description')
                ->required(),
                TextInput::make('prix')
                ->numeric()
                ->required(fn ($livewire) => $livewire instanceof Pages\CreatePlat)
                ->inputMode('decimal'),
                FileUpload::make('image')
                ->required()
                ->image()
                ->maxSize(4048)
                ->directory('plat')
                ->disk('public')
                ->visibility('public'),
                Select::make('categorie_id')
                ->label('Categorie')
                ->relationship('categorie','nom')
                ->required(),
              TextInput::make('user_id')
              ->default(fn (): ?int => Auth::id())
              ->hidden()
              ->dehydrated()

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('nom')->searchable(),
                TextColumn::make('description'),
                TextColumn::make('prix'),
                ImageColumn::make('image')
                ->disk('public'),
                
               
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListPlats::route('/'),
            'create' => Pages\CreatePlat::route('/create'),
            'edit' => Pages\EditPlat::route('/{record}/edit'),
        ];
    }
}
