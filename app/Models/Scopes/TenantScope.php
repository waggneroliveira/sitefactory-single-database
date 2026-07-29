<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Spatie\Multitenancy\Models\Tenant;

class TenantScope implements Scope
{
public function apply(Builder $builder, Model $model)
{
    $tenant = Tenant::current();

    if ($tenant) {
        $builder->where(
            $model->getTable() . '.tenant_id',
            $tenant->id
        );
    }
}
}

