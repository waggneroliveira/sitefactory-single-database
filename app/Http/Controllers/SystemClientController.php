<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\PlanModuleLimit;
use App\Models\TemplateTheme;
use App\Models\Tenant;
use App\Models\TenantModuleLimit;
use App\Services\ThemeManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SystemClientController extends Controller
{
    public function index(Request $request, ThemeManager $themeManager)
    {
        $clients = Tenant::query()
            ->with('plan')
            ->orderBy('name', 'asc')
            ->paginate(20);

        $theme = $themeManager;
        $themeData = $themeManager->theme();

        return view('admin.blades.client-of-system.index', compact(
            'clients',
            'theme',
            'themeData'
        ));
    }

    public function create(ThemeManager $themeManager)
    {
        $plans = Plan::where('active', true)->get();
        $availableModules = $themeManager->availableModules();

        $theme = $themeManager;
        $themeData = $themeManager->theme();
        $templateThemes = TemplateTheme::orderBy('name', 'ASC')->get();
        return view('admin.blades.client-of-system.create', compact(
            'plans',
            'availableModules',
            'theme',
            'themeData',
            'templateThemes',
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'domain' => ['required', 'string', 'max:255', 'unique:tenants,domain'],
            'template_theme_id' => ['nullable', 'exists:template_themes,id'],
            'plan_id' => ['nullable', 'exists:plans,id'],
            'primary_color' => ['nullable', 'string', 'max:10'],
            'secondary_color' => ['nullable', 'string', 'max:10'],
            'accent_color' => ['nullable', 'string', 'max:20'],
            'text_color' => ['nullable', 'string', 'max:10'],
            'path_image_logo_header' => ['nullable', 'string', 'max:255'],
            'path_image_logo_footer' => ['nullable', 'string', 'max:255'],
            'text_button_one' => ['nullable', 'string', 'max:255'],
            'color_button_one' => ['nullable', 'string', 'max:20'],
            'bg_button_one' => ['nullable', 'string', 'max:20'],
            'text_button_two' => ['nullable', 'string', 'max:255'],
            'color_button_two' => ['nullable', 'string', 'max:20'],
            'bg_button_two' => ['nullable', 'string', 'max:20'],
            'text_color_header' => ['nullable', 'string', 'max:10'],
            'bg_header' => ['nullable', 'string', 'max:10'],
            'bg_scroll' => ['nullable', 'string', 'max:10'],
            'copyright' => ['nullable', 'string', 'max:255'],
            'limits' => ['nullable', 'array'],
            'limits.*' => ['nullable', 'integer', 'min:0'],
        ]);

        DB::transaction(function () use ($validated) {
            $tenant = new Tenant();

            $tenant->fill([
                'name' => $validated['name'],
                'domain' => $validated['domain'],
                'template_theme_id' => $validated['template_theme_id'] ?? null,
                'plan_id' => $validated['plan_id'] ?? null,
                'primary_color' => $validated['primary_color'] ?? null,
                'secondary_color' => $validated['secondary_color'] ?? null,
                'accent_color' => $validated['accent_color'] ?? null,
                'text_color' => $validated['text_color'] ?? null,
                'path_image_logo_header' => $validated['path_image_logo_header'] ?? null,
                'path_image_logo_footer' => $validated['path_image_logo_footer'] ?? null,
                'text_button_one' => $validated['text_button_one'] ?? null,
                'color_button_one' => $validated['color_button_one'] ?? null,
                'bg_button_one' => $validated['bg_button_one'] ?? null,
                'text_button_two' => $validated['text_button_two'] ?? null,
                'color_button_two' => $validated['color_button_two'] ?? null,
                'bg_button_two' => $validated['bg_button_two'] ?? null,
                'text_color_header' => $validated['text_color_header'] ?? null,
                'bg_header' => $validated['bg_header'] ?? null,
                'bg_scroll' => $validated['bg_scroll'] ?? null,
                'copyright' => $validated['copyright'] ?? null,
            ]);

            $tenant->save();

            foreach ($validated['limits'] ?? [] as $module => $limit) {
                if ($limit === null || $limit === '') {
                    continue;
                }

                TenantModuleLimit::updateOrCreate(
                    [
                        'tenant_id' => $tenant->id,
                        'module' => $module,
                    ],
                    [
                        'limit' => (int) $limit,
                    ]
                );
            }
        });

        return redirect()
            ->route('admin.dashboard.tenants.index')
            ->with('success', 'Cliente criado com sucesso.');
    }

    public function show(Tenant $tenant, ThemeManager $themeManager)
    {
        $tenant->load('plan');

        $theme = $themeManager;
        $themeData = $themeManager->theme();
        $templateThemes = TemplateTheme::orderBy('name', 'ASC')->first();
        return view('admin.blades.client-of-system.show', compact(
            'tenant',
            'theme',
            'themeData',
            'templateThemes',
        ));
    }

    public function edit(Tenant $tenant, ThemeManager $themeManager)
    {
        $plans = Plan::where('active', true)->get();

        $availableModules = $themeManager->availableModules();

        $tenantModuleLimits = TenantModuleLimit::where('tenant_id', $tenant->id)
            ->get()
            ->keyBy('module');

        $theme = $themeManager;
        $themeData = $themeManager->theme();
        $templateThemes = TemplateTheme::orderBy('name', 'ASC')->get();

        return view('admin.blades.client-of-system.edit', compact(
            'tenant',
            'plans',
            'availableModules',
            'tenantModuleLimits',
            'theme',
            'themeData',
            'templateThemes'
        ));
    }

    // public function update(Request $request, Tenant $tenant)
    // {
    //     $validated = $request->validate([
    //         'name' => ['required', 'string', 'max:255'],
    //         'domain' => [
    //             'required',
    //             'string',
    //             'max:255',
    //             'unique:tenants,domain,' . $tenant->id,
    //         ],
    //         'template_theme_id' => ['nullable', 'exists:template_themes,id'],
    //         'plan_id' => ['nullable', 'exists:plans,id'],
    //         'primary_color' => ['nullable', 'string', 'max:10'],
    //         'secondary_color' => ['nullable', 'string', 'max:10'],
    //         'accent_color' => ['nullable', 'string', 'max:20'],
    //         'text_color' => ['nullable', 'string', 'max:10'],
    //         'path_image_logo_header' => ['nullable', 'string', 'max:255'],
    //         'path_image_logo_footer' => ['nullable', 'string', 'max:255'],
    //         'text_button_one' => ['nullable', 'string', 'max:255'],
    //         'color_button_one' => ['nullable', 'string', 'max:20'],
    //         'bg_button_one' => ['nullable', 'string', 'max:20'],
    //         'text_button_two' => ['nullable', 'string', 'max:255'],
    //         'color_button_two' => ['nullable', 'string', 'max:20'],
    //         'bg_button_two' => ['nullable', 'string', 'max:20'],
    //         'text_color_header' => ['nullable', 'string', 'max:10'],
    //         'bg_header' => ['nullable', 'string', 'max:10'],
    //         'bg_scroll' => ['nullable', 'string', 'max:10'],
    //         'copyright' => ['nullable', 'string', 'max:255'],
    //         'limits' => ['nullable', 'array'],
    //         'limits.*' => ['nullable', 'integer', 'min:0'],
    //     ]);

    //     DB::transaction(function () use ($validated, $tenant) {
    //         $tenant->fill([
    //             'name' => $validated['name'],
    //             'domain' => $validated['domain'],
    //             'template_theme_id' => $validated['template_theme_id'] ?? null,
    //             'plan_id' => $validated['plan_id'] ?? null,
    //             'primary_color' => $validated['primary_color'] ?? null,
    //             'secondary_color' => $validated['secondary_color'] ?? null,
    //             'accent_color' => $validated['accent_color'] ?? null,
    //             'text_color' => $validated['text_color'] ?? null,
    //             'path_image_logo_header' => $validated['path_image_logo_header'] ?? $tenant->path_image_logo_header,
    //             'path_image_logo_footer' => $validated['path_image_logo_footer'] ?? $tenant->path_image_logo_footer,
    //             'text_button_one' => $validated['text_button_one'] ?? null,
    //             'color_button_one' => $validated['color_button_one'] ?? null,
    //             'bg_button_one' => $validated['bg_button_one'] ?? null,
    //             'text_button_two' => $validated['text_button_two'] ?? null,
    //             'color_button_two' => $validated['color_button_two'] ?? null,
    //             'bg_button_two' => $validated['bg_button_two'] ?? null,
    //             'text_color_header' => $validated['text_color_header'] ?? null,
    //             'bg_header' => $validated['bg_header'] ?? null,
    //             'bg_scroll' => $validated['bg_scroll'] ?? null,
    //             'copyright' => $validated['copyright'] ?? null,
    //         ]);

    //         $tenant->save();

    //         $submittedModules = $validated['limits'] ?? [];

    //         foreach ($submittedModules as $module => $limit) {
    //             if ($limit === null || $limit === '') {
    //                 TenantModuleLimit::where('tenant_id', $tenant->id)
    //                     ->where('module', $module)
    //                     ->delete();

    //                 continue;
    //             }

    //             TenantModuleLimit::updateOrCreate(
    //                 [
    //                     'tenant_id' => $tenant->id,
    //                     'module' => $module,
    //                 ],
    //                 [
    //                     'limit' => (int) $limit,
    //                 ]
    //             );
    //         }
    //     });

    //     return redirect()
    //         ->route('admin.dashboard.tenants.index')
    //         ->with('success', 'Cliente atualizado com sucesso.');
    // }

public function update(Request $request, Tenant $tenant)
{
    // dd($request->all());
    $validated = $request->validate([
        'name' => ['required', 'string', 'max:255'],

        'domain' => [
            'required',
            'string',
            'max:255',
            'unique:tenants,domain,' . $tenant->id,
        ],

        'template_theme_id' => [
            'nullable',
            'exists:template_themes,id',
        ],

        'plan_id' => [
            'nullable',
            'exists:plans,id',
        ],

        'primary_color' => ['nullable', 'string', 'max:10'],
        'secondary_color' => ['nullable', 'string', 'max:10'],
        'accent_color' => ['nullable', 'string', 'max:20'],
        'text_color' => ['nullable', 'string', 'max:10'],

        'path_image_logo_header' => [
            'nullable',
            'string',
            'max:255',
        ],

        'path_image_logo_footer' => [
            'nullable',
            'string',
            'max:255',
        ],

        'text_button_one' => ['nullable', 'string', 'max:255'],
        'color_button_one' => ['nullable', 'string', 'max:20'],
        'bg_button_one' => ['nullable', 'string', 'max:20'],

        'text_button_two' => ['nullable', 'string', 'max:255'],
        'color_button_two' => ['nullable', 'string', 'max:20'],
        'bg_button_two' => ['nullable', 'string', 'max:20'],

        'text_color_header' => ['nullable', 'string', 'max:10'],
        'bg_header' => ['nullable', 'string', 'max:10'],
        'bg_scroll' => ['nullable', 'string', 'max:10'],

        'copyright' => ['nullable', 'string', 'max:255'],

        'limits' => ['nullable', 'array'],
        'limits.*' => ['nullable', 'integer', 'min:0'],
    ]);

    DB::transaction(function () use ($validated, $tenant) {

        /*
        |--------------------------------------------------------------------------
        | DADOS DO TENANT
        |--------------------------------------------------------------------------
        */

        $tenant->fill([
            'name' => $validated['name'],
            'domain' => $validated['domain'],
            'template_theme_id' => $validated['template_theme_id'] ?? null,
            'plan_id' => $validated['plan_id'] ?? null,

            'primary_color' => $validated['primary_color'] ?? null,
            'secondary_color' => $validated['secondary_color'] ?? null,
            'accent_color' => $validated['accent_color'] ?? null,
            'text_color' => $validated['text_color'] ?? null,

            'path_image_logo_header' =>
                $validated['path_image_logo_header']
                ?? $tenant->path_image_logo_header,

            'path_image_logo_footer' =>
                $validated['path_image_logo_footer']
                ?? $tenant->path_image_logo_footer,

            'text_button_one' => $validated['text_button_one'] ?? null,
            'color_button_one' => $validated['color_button_one'] ?? null,
            'bg_button_one' => $validated['bg_button_one'] ?? null,

            'text_button_two' => $validated['text_button_two'] ?? null,
            'color_button_two' => $validated['color_button_two'] ?? null,
            'bg_button_two' => $validated['bg_button_two'] ?? null,

            'text_color_header' => $validated['text_color_header'] ?? null,
            'bg_header' => $validated['bg_header'] ?? null,
            'bg_scroll' => $validated['bg_scroll'] ?? null,

            'copyright' => $validated['copyright'] ?? null,
        ]);

        $tenant->save();

        /*
        |--------------------------------------------------------------------------
        | LIMITES PERSONALIZADOS
        |--------------------------------------------------------------------------
        */

        $planLimits = PlanModuleLimit::where('plan_id', $tenant->plan_id)
            ->pluck('limit', 'module');

        $tenantLimits = TenantModuleLimit::where('tenant_id', $tenant->id)
            ->pluck('limit', 'module');

        $effectiveLimits = $planLimits->mapWithKeys(function ($limit, $module) use ($tenantLimits) {
            return [
                $module => $tenantLimits->has($module)
                    ? $tenantLimits->get($module)
                    : $limit,
            ];
        })->toArray();

        // Limites enviados pelo formulário
        $submittedLimits = $validated['limits'] ?? [];

        foreach ($submittedLimits as $module => $limit) {

            // Se deixou vazio, remove a personalização do tenant.
            if ($limit === null || $limit === '') {

                TenantModuleLimit::where('tenant_id', $tenant->id)
                    ->where('module', $module)
                    ->delete();

                continue;
            }

            // Cria ou atualiza o limite personalizado do tenant.
            TenantModuleLimit::updateOrCreate(
                [
                    'tenant_id' => $tenant->id,
                    'module' => $module,
                ],
                [
                    'limit' => (int) $limit,
                ]
            );
        }
    });

    return redirect()
        ->route('admin.dashboard.tenants.index')
        ->with('success', 'Cliente atualizado com sucesso.');
}

    public function destroy(Tenant $tenant)
    {
        DB::transaction(function () use ($tenant) {
            TenantModuleLimit::where('tenant_id', $tenant->id)->delete();
            $tenant->delete();
        });

        return redirect()
            ->route('admin.dashboard.tenants.index')
            ->with('success', 'Cliente excluído com sucesso.');
    }
}

