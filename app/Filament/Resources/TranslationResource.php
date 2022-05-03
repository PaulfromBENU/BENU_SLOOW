<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TranslationResource\Pages;
use App\Filament\Resources\TranslationResource\RelationManagers;
use App\Models\Translation;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class TranslationResource extends Resource
{
    protected static ?string $label = 'translation';
    protected static ?string $pluralLabel = 'translations';

    protected static ?string $model = Translation::class;

    protected static ?string $navigationIcon = 'heroicon-o-translate';

    protected static ?string $navigationGroup = 'Site Data';

    protected static function shouldRegisterNavigation(): bool
    {
        return (auth()->user()->role == 'admin' || auth()->user()->role == 'editor');
    }

    public function mount(): void
    {
        abort_unless((auth()->user()->role == 'admin' || auth()->user()->role == 'editor'), 403);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('page')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('key')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('fr')
                    ->required()
                    ->maxLength(65535),
                Forms\Components\Textarea::make('en')
                    ->required()
                    ->maxLength(65535),
                Forms\Components\Textarea::make('de')
                    ->required()
                    ->maxLength(65535),
                Forms\Components\Textarea::make('lu')
                    ->required()
                    ->maxLength(65535),
                Forms\Components\TextInput::make('translation_key')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Tables\Columns\TextColumn::make('page')->sortable()->searchable(),
                // Tables\Columns\TextColumn::make('key')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('translation_key')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('de')->limit(50),
                Tables\Columns\TextColumn::make('fr')->limit(50),
                Tables\Columns\TextColumn::make('en')->limit(50),
                Tables\Columns\TextColumn::make('lu')->limit(50),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
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
            'index' => Pages\ListTranslations::route('/'),
            'create' => Pages\CreateTranslation::route('/create'),
            'edit' => Pages\EditTranslation::route('/{record}/edit'),
        ];
    }
}
