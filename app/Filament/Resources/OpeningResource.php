<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OpeningResource\Pages;
use App\Filament\Resources\OpeningResource\RelationManagers;
use App\Models\Opening;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Forms\Components\Select;

class OpeningResource extends Resource
{
    protected static ?string $label = 'opening';
    protected static ?string $pluralLabel = 'opening days';

    protected static ?string $model = Opening::class;

    protected static ?string $navigationIcon = 'heroicon-o-plus';

    protected static ?string $navigationGroup = 'Meals & Reservations';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DatePicker::make('date')
                    ->required(),
                Select::make('starting_hour')
                    ->label('Meal Time')
                    ->options([ '10h00', '10h30', '11h00', '11h30', '12h00', '12h30', '13h00', '13h30', '14h00', '18h30', '19h00', '19h30', '20h00', '20h30', '21h00', '21h30', '22h00'])
                    //     '10h00' => '10h00',
                    //     '12h00' => "12h00",
                    //     '1' => "Brunch",
                    //     '2' => "Lunch",
                    //     '3' => "Dinner"
                    // ])
                    ->searchable(),
                Forms\Components\TextInput::make('seats')
                    ->label('Total number of seats')
                    ->required(),
                Select::make('type')
                    ->label('Type of meal')
                    ->options([
                        '0' => "Hosts Table",
                        '1' => "Restaurant",
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('date')
                    ->date(),
                Tables\Columns\TextColumn::make('starting_hour')
                    ->enum([
                        '0' => 'Breakfast',
                        '1' => 'Brunch',
                        '2' => 'Lunch',
                        '3' => 'Dinner',
                    ])
                    ->label('Meal Time'),
                Tables\Columns\TextColumn::make('seats')->label('Total seats'),
                Tables\Columns\TextColumn::make('type')
                    ->enum([
                        '0' => 'Hosts Table',
                        '1' => 'Restaurant',
                    ])
                    ->label('Type of meal'),
            ])
            ->filters([
                //
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
            'index' => Pages\ListOpenings::route('/'),
            'create' => Pages\CreateOpening::route('/create'),
            'edit' => Pages\EditOpening::route('/{record}/edit'),
        ];
    }
}
