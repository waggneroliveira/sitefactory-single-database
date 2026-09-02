<?php

namespace App\Http\Controllers;

use App\Models\Advantage;
use App\Repositories\SettingThemeRepository;
use App\Services\ThemeManager;
use Illuminate\Http\Request;

class AdvantageController extends Controller
{
    protected function getPathUpload(): string
    {
        $themeManager = app(ThemeManager::class);

        $template = $themeManager->current() ?? 'default';
        $variation = $themeManager->variation() ?? 'default';

        return "admin/uploads/images/templates/{$template}/{$variation}/benefitTopic/";
    }
    public function index(ThemeManager $themeManager)
    {
        $settingTheme = (new SettingThemeRepository())->settingTheme();

        // 'slides' → é o módulo definido no template_modules.php.
        // 'slide.visualizar' → é a permissão definida no module_permissions.php.
        $check = checkPermission('testimonials', 'depoimento.visualizar', $settingTheme);
        if ($check !== true) {
            return $check; // retorna view 403
        }

        $advantages = Advantage::sorting()->get();
        $theme = $themeManager;
        $themeData = $themeManager->theme();

        return view('admin.blades.depoiment.index', compact('advantages', 'theme', 'themeData'));
    }

    public function store(Request $request)
    {
        //
    }

    public function update(Request $request, Advantage $advantage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Advantage $advantage)
    {
        //
    }
}
