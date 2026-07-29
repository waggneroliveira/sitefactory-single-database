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
    ];

    public function templateTheme()
    {
        return $this->belongsTo(TemplateTheme::class);
    }
}