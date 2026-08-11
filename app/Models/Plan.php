<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Plan extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'price',
        'active',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'active' => 'boolean',
    ];

    public function moduleLimits(): HasMany
    {
        return $this->hasMany(
            PlanModuleLimit::class
        );
    }

    public function tenants(): HasMany
    {
        return $this->hasMany(
            Tenant::class
        );
    }
}