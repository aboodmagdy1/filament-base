<?php 

namespace App\Settings;

use Spatie\LaravelSettings\Settings;
class GeneralSettings extends Settings
{
    public string $name_ar;
    public string $name_en;
    public string $email;
    public string $phone;
    public string $logo_ar;
    public string $logo_en;


    public static function group(): string
    {
        return 'general';
    }

    public function getLogoArAttribute($value)
    {
        return $value ?: asset('frontend/images/logo.jpg');
    }
    public function getLogoEnAttribute($value)
    {
        return $value ?: asset('frontend/images/logo.jpg');
    }

}
