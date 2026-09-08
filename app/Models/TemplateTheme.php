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
        'highlights',
        'technology',
    ];

    protected $casts = [
        'preview' => 'array',
        'active' => 'boolean',
    ];
}
