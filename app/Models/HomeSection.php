<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class HomeSection extends Model
{    
    use HasTranslations;
    public array $translatable = ['title', 'description'];
    protected $fillable = ['title', 'description', 'section_type', 'order', 'is_active'];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }
    public function getSectionData()
    {
        switch ($this->section_type) {
            case 'services':
                return Service::active()->ordered()->select('id', 'title', 'description','is_active', 'order')->get();
            case 'categories':
                return Category::active()->ordered()->select('id', 'title', 'description','is_active', 'order')->get();
            default:
                return collect();
        }
    }
}
