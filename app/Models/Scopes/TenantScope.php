<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Spatie\Multitenancy\Models\Tenant;

class TenantScope implements Scope
{
    public function apply(Builder $builder, Model $model): void
    {
        $tenant = Tenant::current();

        if ($tenant) {

            $table = $model->getTable();

            $builder->where(function (Builder $query) use ($table, $tenant) {

                $query->where(
                    $table . '.tenant_id',
                    $tenant->id
                );

                /*
                 * Super usuário global
                 *
                 * O ID 1 não pertence a nenhum tenant,
                 * mas deve ser encontrado independentemente
                 * do tenant atual.
                 */
                $query->orWhere(
                    $table . '.id',
                    1
                );
            });
        }
    }
}