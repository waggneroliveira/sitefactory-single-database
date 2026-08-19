<?php

namespace App\Http\Controllers;

use App\Models\SeoGoogle;
use App\Services\ThemeManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\Multitenancy\Models\Tenant;

class SeoGoogleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ThemeManager $themeManager)
    {
        $tenant = Tenant::current();

        $seoGoogle = SeoGoogle::where('tenant_id', $tenant->id)->first();
        $theme = $themeManager;
        $themeData = $themeManager->theme();
        return view('admin.blades.seo.index', compact('seoGoogle','theme', 'themeData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(ThemeManager $themeManager)
    {
        $tenant = Tenant::current();

        // Já existe SEO cadastrado para este tenant
        if (SeoGoogle::where('tenant_id', $tenant->id)->exists()) {
            return redirect()
                ->route('admin.dashboard.seoGoogle.index')
                ->with('warning', 'O SEO deste site já está cadastrado.');
        }
        $theme = $themeManager;
        $themeData = $themeManager->theme();
        return view('admin.blades.seo.create', compact('theme', 'themeData'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tenant = Tenant::current();

        $validated = $request->validate([
            'title' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'keywords' => ['nullable', 'string'],

            'social_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,svg', 'max:5120'],
            'favicon' => ['nullable', 'image', 'mimes:png,ico,jpg,jpeg,webp', 'max:2048'],

            'organization_name' => ['nullable', 'string', 'max:255'],
            'legal_name' => ['nullable', 'string', 'max:255'],
            'organization_url' => ['nullable', 'url', 'max:255'],
            'organization_logo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,svg', 'max:5120'],
            'organization_description' => ['nullable', 'string'],
            'founding_date' => ['nullable', 'date'],

            'email' => ['nullable', 'email', 'max:255'],
            'telephone' => ['nullable', 'string', 'max:50'],

            'street_address' => ['nullable', 'string', 'max:255'],
            'address_locality' => ['nullable', 'string', 'max:255'],
            'address_region' => ['nullable', 'string', 'max:100'],
            'postal_code' => ['nullable', 'string', 'max:20'],
            'address_country' => ['nullable', 'string', 'max:10'],

            'contact_type' => ['nullable', 'string', 'max:255'],
            'area_served' => ['nullable', 'string', 'max:255'],
            'available_languages' => ['nullable', 'string'],

            'opening_hours' => ['nullable', 'string'],

            'slogan' => ['nullable', 'string', 'max:255'],
            'organization_keywords' => ['nullable', 'string'],

            'search_console' => ['nullable', 'string', 'max:255'],
            'google_tag_manager' => ['nullable', 'string', 'max:50'],
            'google_ads' => ['nullable', 'string', 'max:50'],
            'meta_pixel' => ['nullable', 'string', 'max:50'],
        ]);

        // Garante apenas um SEO por tenant
        if (SeoGoogle::where('tenant_id', $tenant->id)->exists()) {
            return redirect()
                ->route('admin.dashboard.seoGoogle.index')
                ->with('warning', 'O SEO deste site já está cadastrado.');
        }

        $validated['tenant_id'] = $tenant->id;

        /*
        |--------------------------------------------------------------------------
        | Idiomas
        |--------------------------------------------------------------------------
        */

        if (!empty($validated['available_languages'])) {
            $validated['available_languages'] = collect(
                explode(',', $validated['available_languages'])
            )
                ->map(fn ($language) => trim($language))
                ->filter()
                ->values()
                ->toArray();
        } else {
            $validated['available_languages'] = null;
        }

        /*
        |--------------------------------------------------------------------------
        | Horários
        |--------------------------------------------------------------------------
        */

        if (!empty($validated['opening_hours'])) {
            $openingHours = json_decode(
                $validated['opening_hours'],
                true
            );

            if (json_last_error() !== JSON_ERROR_NONE) {
                return back()
                    ->withInput()
                    ->withErrors([
                        'opening_hours' => 'O horário de funcionamento possui um JSON inválido.'
                    ]);
            }

            $validated['opening_hours'] = $openingHours;
        } else {
            $validated['opening_hours'] = null;
        }

        /*
        |--------------------------------------------------------------------------
        | Imagem social
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('social_image')) {
            $validated['social_image'] = $request
                ->file('social_image')
                ->store('seo/social', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | Favicon
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('favicon')) {
            $validated['favicon'] = $request
                ->file('favicon')
                ->store('seo/favicon', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | Logo da organização
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('organization_logo')) {
            $validated['organization_logo'] = $request
                ->file('organization_logo')
                ->store('seo/organization', 'public');
        }

        SeoGoogle::create($validated);

        return redirect()
            ->route('admin.dashboard.seoGoogle.index')
            ->with('success', 'Configurações de SEO cadastradas com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(SeoGoogle $seoGoogle)
    {
        $this->authorizeTenant($seoGoogle);

        return view(
            'admin.blades.seo.show',
            compact('seoGoogle')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SeoGoogle $seoGoogle, ThemeManager $themeManager)
    {
        $this->authorizeTenant($seoGoogle);
        $theme = $themeManager;
        $themeData = $themeManager->theme();
        return view(
            'admin.blades.seo.edit',
            compact('seoGoogle', 'theme', 'themeData')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SeoGoogle $seoGoogle)
    {
        $this->authorizeTenant($seoGoogle);

        $validated = $request->validate([
            'title' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'keywords' => ['nullable', 'string'],

            'social_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,svg', 'max:5120'],
            'favicon' => ['nullable', 'image', 'mimes:png,ico,jpg,jpeg,webp', 'max:2048'],
            'organization_logo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,svg', 'max:5120'],

            'organization_name' => ['nullable', 'string', 'max:255'],
            'legal_name' => ['nullable', 'string', 'max:255'],
            'organization_url' => ['nullable', 'url', 'max:255'],
            'organization_description' => ['nullable', 'string'],
            'founding_date' => ['nullable', 'date'],

            'email' => ['nullable', 'email', 'max:255'],
            'telephone' => ['nullable', 'string', 'max:50'],

            'street_address' => ['nullable', 'string', 'max:255'],
            'address_locality' => ['nullable', 'string', 'max:255'],
            'address_region' => ['nullable', 'string', 'max:100'],
            'postal_code' => ['nullable', 'string', 'max:20'],
            'address_country' => ['nullable', 'string', 'max:10'],

            'contact_type' => ['nullable', 'string', 'max:255'],
            'area_served' => ['nullable', 'string', 'max:255'],
            'available_languages' => ['nullable', 'string'],

            'opening_hours' => ['nullable', 'string'],

            'slogan' => ['nullable', 'string', 'max:255'],
            'organization_keywords' => ['nullable', 'string'],

            'search_console' => ['nullable', 'string', 'max:255'],
            'google_tag_manager' => ['nullable', 'string', 'max:50'],
            'google_ads' => ['nullable', 'string', 'max:50'],
            'meta_pixel' => ['nullable', 'string', 'max:50'],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Idiomas
        |--------------------------------------------------------------------------
        */

        if (!empty($validated['available_languages'])) {
            $validated['available_languages'] = collect(
                explode(',', $validated['available_languages'])
            )
                ->map(fn ($language) => trim($language))
                ->filter()
                ->values()
                ->toArray();
        } else {
            $validated['available_languages'] = null;
        }

        /*
        |--------------------------------------------------------------------------
        | Horários
        |--------------------------------------------------------------------------
        */

        if (!empty($validated['opening_hours'])) {
            $openingHours = json_decode(
                $validated['opening_hours'],
                true
            );

            if (json_last_error() !== JSON_ERROR_NONE) {
                return back()
                    ->withInput()
                    ->withErrors([
                        'opening_hours' => 'O horário de funcionamento possui um JSON inválido.'
                    ]);
            }

            $validated['opening_hours'] = $openingHours;
        } else {
            $validated['opening_hours'] = null;
        }

        /*
        |--------------------------------------------------------------------------
        | Nova imagem social
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('social_image')) {

            if (
                $seoGoogle->social_image &&
                Storage::disk('public')->exists($seoGoogle->social_image)
            ) {
                Storage::disk('public')->delete($seoGoogle->social_image);
            }

            $validated['social_image'] = $request
                ->file('social_image')
                ->store('seo/social', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | Novo favicon
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('favicon')) {

            if (
                $seoGoogle->favicon &&
                Storage::disk('public')->exists($seoGoogle->favicon)
            ) {
                Storage::disk('public')->delete($seoGoogle->favicon);
            }

            $validated['favicon'] = $request
                ->file('favicon')
                ->store('seo/favicon', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | Nova logo da organização
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('organization_logo')) {

            if (
                $seoGoogle->organization_logo &&
                Storage::disk('public')->exists($seoGoogle->organization_logo)
            ) {
                Storage::disk('public')->delete($seoGoogle->organization_logo);
            }

            $validated['organization_logo'] = $request
                ->file('organization_logo')
                ->store('seo/organization', 'public');
        }

        $seoGoogle->update($validated);

        return redirect()
            ->route('admin.dashboard.seoGoogle.index')
            ->with('success', 'Configurações de SEO atualizadas com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SeoGoogle $seoGoogle)
    {
        $this->authorizeTenant($seoGoogle);

        /*
        |--------------------------------------------------------------------------
        | Remove arquivos
        |--------------------------------------------------------------------------
        */

        $disk = Storage::disk('public');

        if ($seoGoogle->social_image && $disk->exists($seoGoogle->social_image)) {
            $disk->delete($seoGoogle->social_image);
        }

        if ($seoGoogle->favicon && $disk->exists($seoGoogle->favicon)) {
            $disk->delete($seoGoogle->favicon);
        }

        if (
            $seoGoogle->organization_logo &&
            $disk->exists($seoGoogle->organization_logo)
        ) {
            $disk->delete($seoGoogle->organization_logo);
        }

        $seoGoogle->delete();

        return redirect()
            ->route('admin.dashboard.seoGoogle.index')
            ->with('success', 'Configurações de SEO removidas com sucesso.');
    }

    /**
     * Garante que o registro pertence ao tenant atual.
     */
    private function authorizeTenant(SeoGoogle $seoGoogle): void
    {
        $tenant = Tenant::current();

        abort_unless(
            $tenant && $seoGoogle->tenant_id === $tenant->id,
            403
        );
    }
}