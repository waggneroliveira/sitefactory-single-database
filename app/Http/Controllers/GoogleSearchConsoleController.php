<?php

namespace App\Http\Controllers;

use App\Repositories\SettingThemeRepository;
use App\Services\Google\SearchConsoleService;
use App\Services\ThemeManager;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Tenant;

class GoogleSearchConsoleController extends Controller
{
        public function index(ThemeManager $themeManager)
    {
        $settingTheme = (new SettingThemeRepository())->settingTheme();

        // 'slides' → é o módulo definido no template_modules.php.
        // 'slide.visualizar' → é a permissão definida no module_permissions.php.
        $check = checkPermission('testimonials', 'depoimento.visualizar', $settingTheme);
        if ($check !== true) {
            return $check; // retorna view 403
        }

        $theme = $themeManager;
        $themeData = $themeManager->theme();

        return view('admin.blades.google.search-console.index', compact('theme', 'themeData'));
        
    }

    public function connect(
        SearchConsoleService $service
    ): RedirectResponse {
        return redirect()->away(
            $service->getAuthorizationUrl()
        );
    }

    public function callback(
        Request $request,
        SearchConsoleService $service
    ): RedirectResponse {
        if (!$request->filled('code')) {
            return redirect()
                ->route('google.search-console.index')
                ->with('error', 'Autorização do Google não realizada.');
        }

        $service->authenticate(
            $request->string('code')->toString()
        );

        return redirect()
            ->route('google.search-console.index')
            ->with('success', 'Google Search Console conectado com sucesso.');
    }

    public function properties(SearchConsoleService $service) {
        return response()->json(
            $service->getProperties()
        );
    }

    public function performance(
        Tenant $tenant,
        SearchConsoleService $service
    ) {
        $searchConsole = $tenant->googleSearchConsole;

        if (!$searchConsole || !$searchConsole->active) {
            return response()->json([
                'message' => 'Google Search Console não configurado para este site.'
            ], 404);
        }

        return response()->json(
            $service->getDashboardData(
                $searchConsole->property
            )
        );
    }
}