<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class TemplateTheme extends Model
{
    use Notifiable, HasFactory;
    
    protected $fillable = [
        'slug',
        'name',
        'preview',
        'active',
        'template_variation',
        'primary_color',
        'secondary_color',
        'accent_color',
        'text_color',
        'path_image_logo_header',
        'path_image_logo_footer',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];
}
