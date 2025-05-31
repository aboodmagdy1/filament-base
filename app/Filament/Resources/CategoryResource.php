<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\Concerns\Translatable;

class CategoryResource extends Resource
{
    use Translatable;
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';

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
                    ->label('Order')
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
    public static function getPluralLabel(): string
    {
        return __('Categories');
    }
    public static function getNavigationGroup(): ?string
    {
        return __('Main Core');
    }
}