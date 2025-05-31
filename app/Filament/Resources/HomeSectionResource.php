<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HomeSectionResource\Pages;
use App\Filament\Resources\HomeSectionResource\RelationManagers;
use App\Models\HomeSection;
use BcMath\Number;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\Concerns\Translatable;

class HomeSectionResource extends Resource
{
    use Translatable;
    protected static ?string $model = HomeSection::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            // section_type is text input but i want user to select from a dropdown
           Section::make('')
                ->schema([
                Toggle::make('is_active')
                    ->translateLabel()
                    ->label('Is Active')
                    ->default(1),
            ]),
            Select::make('section_type')
                ->translateLabel()
                ->label('Section Type')
                ->translateLabel()
                ->options([
                    'services' => __('Services'),
                    'categories' => __('Categories'),
                ]),
                TextInput::make('title')
                    ->translateLabel()
                    ->label('Title'),
                TextInput::make('description')
                    ->translateLabel()
                    ->label('Description'),
                TextInput::make('order')
                    ->numeric()
                    ->translateLabel()
                    ->label('Order'),
                    
                    
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('section_type')
                    ->translateLabel()
                    ->label('Section Type'),
                TextColumn::make('title')
                    ->translateLabel()
                    ->label('Title'),
                
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
                    }),
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
            'index' => Pages\ListHomeSections::route('/'),
            'create' => Pages\CreateHomeSection::route('/create'),
            'edit' => Pages\EditHomeSection::route('/{record}/edit'),
        ];
    }

    public static function getPluralLabel(): string
    {
        return __('Home Sections');
    }
    public static function getNavigationGroup(): ?string
    {
        return __('Main Core');
    }
}
