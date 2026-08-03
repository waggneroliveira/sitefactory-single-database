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
        'text_button_one',
        'color_button_one',
        'bg_button_one',
        'text_button_two',
        'color_button_two',
        'bg_button_two',
        'text_color_header',
        'bg_header',
        'bg_scroll',
        'copyright',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];
}
