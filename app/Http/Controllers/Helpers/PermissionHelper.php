<?php

use Illuminate\Support\Facades\Auth;

if (!function_exists('checkPermission')) {
    /**
     * Verifica se o usuário atual tem permissão para acessar um recurso.
     * Se não tiver, retorna a view 403.
     *
     * @param string $permission
     * @param mixed $settingTheme
     * @return bool|\Illuminate\View\View
     */
    function checkPermission(string $module, string $permission, $settingTheme)
    {
        $user = Auth::user();

        if (!$user) {
            return view('admin.error.403', compact('settingTheme'));
        }

        // Super continua tendo acesso total
        if (
            $user->hasRole('Super') ||
            $user->can('usuario.tornar usuario master')
        ) {
            return true;
        }

        /*
        |--------------------------------------------------------------------------
        | Verifica se o módulo existe no template atual
        |--------------------------------------------------------------------------
        */

        $themeManager = app(\App\Services\ThemeManager::class);
        $themeData = $themeManager->theme();

        $template = $themeData->slug;

        $templateModules = config("template_modules.{$template}", []);

        $modules = collect($templateModules)
            ->except('limits')
            ->flatten()
            ->unique();

        if (!$modules->contains($module)) {
            return view('admin.error.403', compact('settingTheme'));
        }

        /*
        |--------------------------------------------------------------------------
        | Verifica se a permissão pertence ao módulo
        |--------------------------------------------------------------------------
        */

        $permissionConfig = config("module_permissions.{$module}");

        if (!$permissionConfig) {
            return view('admin.error.403', compact('settingTheme'));
        }

        $permissionPrefix = $permissionConfig['permission'];

        $permissionBelongsToModule =
            str_starts_with($permission, $permissionPrefix . '.');

        if (!$permissionBelongsToModule) {
            return view('admin.error.403', compact('settingTheme'));
        }

        /*
        |--------------------------------------------------------------------------
        | Verifica a permissão do usuário
        |--------------------------------------------------------------------------
        */

        if (!$user->hasPermissionTo($permission)) {
            return view('admin.error.403', compact('settingTheme'));
        }

        return true;
    }
}