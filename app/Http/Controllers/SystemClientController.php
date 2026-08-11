<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Tenant;
use App\Models\TenantModuleLimit;
use App\Services\ThemeManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SystemClientController extends Controller
{
    public function index(Request $request, ThemeManager $themeManager)
    {
        $clients = Tenant::query()
            ->orderBy('created_at', 'desc')
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

        return view('admin.blades.client-of-system.create', compact(
            'plans',
            'availableModules',
            'theme',
            'themeData'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'domain' => ['required', 'string', 'max:255', 'unique:tenants,domain'],
            'email' => ['nullable', 'email', 'max:255'],
            'password' => ['nullable', 'string', 'min:6'],
            'plan_id' => ['nullable', 'exists:plans,id'],
            'limits' => ['nullable', 'array'],
            'limits.*' => ['nullable', 'integer', 'min:0'],
        ]);

        DB::transaction(function () use ($validated) {
            $tenant = new Tenant();

            $tenant->name = $validated['name'];
            $tenant->domain = $validated['domain'];
            $tenant->email = $validated['email'] ?? null;
            $tenant->plan_id = $validated['plan_id'] ?? null;

            if (!empty($validated['password'])) {
                $tenant->password = Hash::make($validated['password']);
            }

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
        $theme = $themeManager;
        $themeData = $themeManager->theme();

        return view('admin.blades.client-of-system.show', compact(
            'tenant',
            'theme',
            'themeData'
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

        return view('admin.blades.client-of-system.edit', compact(
            'tenant',
            'plans',
            'availableModules',
            'tenantModuleLimits',
            'theme',
            'themeData'
        ));
    }

    public function update(Request $request, Tenant $tenant)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'domain' => [
                'required',
                'string',
                'max:255',
                'unique:tenants,domain,' . $tenant->id,
            ],
            'email' => ['nullable', 'email', 'max:255'],
            'password' => ['nullable', 'string', 'min:6'],
            'plan_id' => ['nullable', 'exists:plans,id'],
            'limits' => ['nullable', 'array'],
            'limits.*' => ['nullable', 'integer', 'min:0'],
        ]);

        DB::transaction(function () use ($validated, $tenant) {
            $tenant->name = $validated['name'];
            $tenant->domain = $validated['domain'];
            $tenant->email = $validated['email'] ?? null;
            $tenant->plan_id = $validated['plan_id'] ?? null;

            if (!empty($validated['password'])) {
                $tenant->password = Hash::make($validated['password']);
            }

            $tenant->save();

            $submittedModules = $validated['limits'] ?? [];

            foreach ($submittedModules as $module => $limit) {
                if ($limit === null || $limit === '') {
                    TenantModuleLimit::where('tenant_id', $tenant->id)
                        ->where('module', $module)
                        ->delete();

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