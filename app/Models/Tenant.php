<?php

namespace App\Models;

use Spatie\Multitenancy\Models\Tenant as BaseTenant;

class Tenant extends BaseTenant
{
    protected $fillable = [
        'name',
        'domain',
        'database',
        'template_theme_id',

        // Cores
        'primary_color',
        'secondary_color',
        'accent_color',
        'text_color',

        // Logos
        'path_image_logo_header',
        'path_image_logo_footer',

        // Botão 1
        'text_button_one',
        'color_button_one',
        'bg_button_one',

        // Botão 2
        'text_button_two',
        'color_button_two',
        'bg_button_two',

        // Header
        'text_color_header',
        'bg_header',
        'bg_scroll',

        // Rodapé
        'copyright',
    ];

    public function templateTheme()
    {
        return $this->belongsTo(TemplateTheme::class);
    }
}