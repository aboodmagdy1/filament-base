<?php

namespace App\Filament\Pages;

use App\Settings\GeneralSettings;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class ManageGeneral extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?string $navigationGroup = 'Settings';
    protected static string $settings = GeneralSettings::class;
    protected static ?int $navigationSort = 20;
    protected static ?string $navigationLabel = 'General Settings';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make(__('General Settings'))
                    ->schema([
                        Forms\Components\TextInput::make('name_ar')
                            ->label('Arabic Name')
                            ->translateLabel()
                            ->required(),
                        Forms\Components\TextInput::make('name_en')
                            ->label('English Name')
                            ->translateLabel()
                            ->required(),
                        Forms\Components\TextInput::make('email')
                            ->label('Email')
                            ->translateLabel()
                            ->email()
                            ->required(),
                        Forms\Components\TextInput::make('phone')
                            ->label('Phone')
                            ->translateLabel()
                            ->required(),
                        Forms\Components\FileUpload::make('logo_ar')
                            ->label('Arabic Logo')
                            ->translateLabel()
                            ->required()
                            ->default(asset('frontend/images/logo.jpg'))
                            ->image(),
                        Forms\Components\FileUpload::make('logo_en')
                            ->label('English Logo')
                            ->translateLabel()
                            ->required()
                            ->default(asset('/frontend/images/logo.jpg'))
                            ->image(),
                      
                            
                    ]),
                
            ]);
    }


    public static function getNavigationGroup(): ?string
    {
        return __('Settings');
    }

    public static function getNavigationLabel(): string
    {
        return __('General Settings');
    }
    public function getTitle(): string|\Illuminate\Contracts\Support\Htmlable
    {
        return __('Manage General Settings');
    }

}
