<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Filament\Resources\ServiceResource\RelationManagers;
use App\Models\Service;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TagsColumn;
use Filament\Tables\Table;
use Filament\Resources\Concerns\Translatable;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Toggle;

class ServiceResource extends Resource
{
    use Translatable;
    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'heroicon-o-wrench-screwdriver';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('')
                    ->translateLabel()
                    ->schema([
                    Toggle::make('is_active')
                    ->translateLabel()
                    ->label('Is Active')
                    ->default(1),
                ]),
                TextInput::make('title')
                    ->translateLabel()
                    ->label('Title')
                    ->required(),
                TextInput::make('description')
                    ->translateLabel()
                    ->label('Description')
                    ->required(),
                TextInput::make('order')
                    ->translateLabel()
                    ->numeric()
                    ->label('Order')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->translateLabel()
                    ->label('Title'),
                TextColumn::make('description')
                    ->translateLabel()
                    ->label('Description'),
                TextColumn::make('order')
                    ->translateLabel()
                    ->label('Order'),
                TextColumn::make('is_active')
                    ->translateLabel()
                    ->label('Status')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => $state === '1' ? __('Active') : __('Inactive'))
                    ->color(fn (string $state): string => match ($state) {
                        '1' => 'success',
                        '0' => 'danger',
                    })
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }

    public static function getPluralLabel(): string
    {
        return __('Services');
    }
    public static function getNavigationGroup(): ?string
    {
        return __('Main Core');
    }
}
