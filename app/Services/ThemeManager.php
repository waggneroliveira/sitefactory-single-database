<?php

namespace App\Services;

use App\Models\TemplateTheme;
use App\Models\Tenant;
use App\Models\TenantModuleLimit;
use Illuminate\Support\Str;

class ThemeManager
{
    /**
     * Retorna o tema atual do tenant.
     */
    public function theme(): ?TemplateTheme
    {
        return Tenant::current()?->templateTheme;
    }

    /**
     * Permite acessar diretamente propriedades do TemplateTheme.
     *
     * Exemplo:
     * $theme->slug
     * $theme->primary_color
     */
    public function __get($name)
    {
        return $this->theme()?->{$name};
    }

    /**
     * Retorna o slug do tema atual.
     */
    public function current(): string
    {  
        return $this->theme()?->slug ?? 'default';
    }

    /**
     * Retorna a variação atual do template.
     */
    public function variation(): ?string
    {
        return $this->theme()?->template_variation ?? 'error';
    }

    /**
     * Retorna o caminho da view core do tema.
     */
    public function core(string $view): string
    {
        return "client.themes.{$this->current()}.{$this->variation()}.core.{$view}";
    }

    /**
     * Retorna o caminho de uma view principal do tema.
     */
    public function view(string $view): string
    {
        return "client.themes.{$this->current()}.{$this->variation()}.blades.{$view}";
    }

    /**
     * Retorna o caminho de um include do tema.
     */
    public function includes(string $view): string
    {
        return "client.themes.{$this->current()}.{$this->variation()}.includes.{$view}";
    }

    /**
     * Retorna o caminho de um asset do tema.
     */
    public function asset(string $path): string
    {
        return asset("themes/{$this->current()}/{$path}");
    }

    /**
     * Verifica se o módulo existe no template atual.
     */
    public function hasModule(string $module): bool
    {
        $modules = config("template_modules.{$this->current()}", []);

        return collect($modules)
            ->flatten()
            ->filter(fn ($item) => is_string($item))
            ->contains($module);
    }

    /**
     * Verifica se pelo menos um dos módulos informados
     * existe no template atual.
     */
    public function hasAnyModule(array $modules): bool
    {
        foreach ($modules as $module) {
            if ($this->hasModule($module)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Retorna o limite efetivo de um módulo.
     *
     * Prioridade:
     *
     * 1. Limite personalizado do tenant
     * 2. Limite definido no plano
     * 3. Limite definido no template_modules.php
     * 4. Valor default informado
     *
     * Exemplo:
     *
     * $theme->getLimit('slides');
     */
    public function getLimit(string $module, ?int $default = null): ?int
    {
        $tenant = Tenant::current();

        if (!$tenant) {
            return $default;
        }

        /*
        |--------------------------------------------------------------------------
        | 1. Limite personalizado do Tenant
        |--------------------------------------------------------------------------
        */

        $customLimit = TenantModuleLimit::query()
            ->where('tenant_id', $tenant->id)
            ->where('module', $module)
            ->value('limit');

        if ($customLimit !== null) {
            return (int) $customLimit;
        }

        /*
        |--------------------------------------------------------------------------
        | 2. Limite definido pelo Plano
        |--------------------------------------------------------------------------
        */

        if ($tenant->plan_id) {
            $planLimit = $tenant->plan
                ?->moduleLimits()
                ->where('module', $module)
                ->value('limit');

            if ($planLimit !== null) {
                return (int) $planLimit;
            }
        }

        /*
        |--------------------------------------------------------------------------
        | 3. Limite definido no template_modules.php
        |--------------------------------------------------------------------------
        */

        $templateSlug = $this->current();

        $templateLimit = config(
            "template_modules.{$templateSlug}.limits.{$module}"
        );

        if ($templateLimit !== null) {
            return (int) $templateLimit;
        }

        /*
        |--------------------------------------------------------------------------
        | 4. Valor padrão
        |--------------------------------------------------------------------------
        */

        return $default;
    }

    /**
     * Retorna todos os módulos disponíveis no template atual.
     *
     * Não considera limites de tenant ou plano.
     *
     * Exemplo:
     *
     * [
     *     'slides' => 'Slides',
     *     'topics' => 'Topics',
     *     'faq' => 'Faq',
     * ]
     */
    public function availableModules(): array
    {
        $modules = config("template_modules.{$this->current()}", []);

        return collect($modules)
            ->flatten()
            ->filter(fn ($module) => is_string($module))
            ->unique()
            ->sort()
            ->mapWithKeys(fn ($module) => [
                $module => Str::headline($module),
            ])
            ->toArray();
    }
}

