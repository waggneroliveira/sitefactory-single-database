<?php

namespace App\Services;

// use Spatie\Multitenancy\Models\Tenant;
use App\Models\TemplateTheme;
use App\Models\Tenant;

class ThemeManager
{
    public function theme(): ?TemplateTheme
    {
        return Tenant::current()?->templateTheme;
    }

    public function __get($name)
    {
        return $this->theme()?->{$name};
    }

    public function current(): string
    {
        return $this->theme()?->slug ?? 'default';
    }

    public function variation(): ?string
    {
        return $this->theme()?->template_variation;
    }

    public function core(string $view): string
    {
        return "client.themes.{$this->current()}.{$this->variation()}.core.{$view}";
    }

    public function view(string $view): string
    {
        return "client.themes.{$this->current()}.{$this->variation()}.blades.{$view}";
    }
    public function includes(string $view): string
    {
        return "client.themes.{$this->current()}.{$this->variation()}.includes.{$view}";
    }

    public function asset(string $path): string
    {
        return asset("themes/{$this->current()}/{$path}");
    }

    public function hasModule(string $module): bool
    {
        $modules = config("template_modules.{$this->slug}", []);

        return collect($modules)
            ->flatten()
            ->contains($module);
    }
    
    public function hasAnyModule(array $modules): bool
    {
        foreach ($modules as $module) {
            if ($this->hasModule($module)) {
                return true;
            }
        }

        return false;
    }
}