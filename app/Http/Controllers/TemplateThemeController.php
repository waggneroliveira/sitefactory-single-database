<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Helpers\HelperArchive;
use App\Models\TemplateTheme;
use App\Repositories\SettingThemeRepository;
use App\Services\ThemeManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;
use Intervention\Image\ImageManager;
use RealRashid\SweetAlert\Facades\Alert;

class TemplateThemeController extends Controller
{
    protected function getPathUpload(): string
    {
        $themeManager = app(ThemeManager::class);

        $template = $themeManager->current() ?? 'default';
        $variation = $themeManager->variation() ?? 'default';

        return "admin/uploads/images/templates/{$template}/{$variation}/template-theme/";
    }

    public function index(ThemeManager $themeManager)
    {
        $settingTheme = (new SettingThemeRepository())->settingTheme();

        // Verifica permissão para visualizar templateThemes
        // $check = checkPermission('templateTheme.visualizar', $settingTheme);
        // if ($check !== true) {
        //     return $check; // retorna view 403
        // }
        
        $templateTheme = TemplateTheme::where('active', 1)->first();
        $theme = $themeManager;
        $themeData = $themeManager->theme();
        return view('admin.blades.templateTheme.index', compact('templateTheme', 'settingTheme', 'theme', 'themeData'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'path_image_logo_header' => [
                'nullable',
                'file',
                'image',
                'max:2048'
            ],

            'path_image_logo_footer' => [
                'nullable',
                'file',
                'image',
                'max:2048'
            ],
        ]);

        $data = $request->except([
            'path_image_logo_header',
            'path_image_logo_footer',
            'delete_path_image_logo_header',
            'delete_path_image_logo_footer',
        ]);

        $pathUpload = $this->getPathUpload();

        $manager = new ImageManager(
            new GdDriver()
        );

        /*
        |--------------------------------------------------------------------------
        | Logo Header
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('path_image_logo_header')) {

            $file = $request->file(
                'path_image_logo_header'
            );

            $mime = $file->getMimeType();

            $extension = strtolower(
                $file->getClientOriginalExtension()
            );

            $isSvg = $mime === 'image/svg+xml'
                || $extension === 'svg';

            /*
            |--------------------------------------------------------------------------
            | SVG
            |--------------------------------------------------------------------------
            */

            if ($isSvg) {

                $filename = Str::uuid()->toString() . '.svg';

                Storage::disk('public')->putFileAs(
                    $pathUpload,
                    $file,
                    $filename
                );

            } else {

                /*
                |--------------------------------------------------------------------------
                | Converter para AVIF
                |--------------------------------------------------------------------------
                */

                $filename = Str::uuid()->toString() . '.avif';

                $image = $manager
                    ->read($file)
                    ->resize(
                        null,
                        null,
                        function ($constraint) {

                            $constraint->aspectRatio();

                            $constraint->upsize();

                        }
                    )
                    ->toAvif(quality: 95)
                    ->toString();

                Storage::disk('public')->put(
                    $pathUpload . $filename,
                    $image
                );

            }

            $data['path_image_logo_header'] =
                $pathUpload . $filename;

        }

        /*
        |--------------------------------------------------------------------------
        | Logo Footer
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('path_image_logo_footer')) {

            $file = $request->file(
                'path_image_logo_footer'
            );

            $mime = $file->getMimeType();

            $extension = strtolower(
                $file->getClientOriginalExtension()
            );

            $isSvg = $mime === 'image/svg+xml'
                || $extension === 'svg';

            /*
            |--------------------------------------------------------------------------
            | SVG
            |--------------------------------------------------------------------------
            */

            if ($isSvg) {

                $filename = Str::uuid()->toString()
                    . '_footer.svg';

                Storage::disk('public')->putFileAs(
                    $pathUpload,
                    $file,
                    $filename
                );

            } else {

                /*
                |--------------------------------------------------------------------------
                | Converter para AVIF
                |--------------------------------------------------------------------------
                */

                $filename = Str::uuid()->toString()
                    . '_footer.avif';

                $image = $manager
                    ->read($file)
                    ->resize(
                        null,
                        null,
                        function ($constraint) {

                            $constraint->aspectRatio();

                            $constraint->upsize();

                        }
                    )
                    ->toAvif(quality: 95)
                    ->toString();

                Storage::disk('public')->put(
                    $pathUpload . $filename,
                    $image
                );

            }

            $data['path_image_logo_footer'] =
                $pathUpload . $filename;

        }

        $data['active'] = $request->boolean('active') ? 1 : 0;

        try {

            DB::beginTransaction();

            TemplateTheme::create($data);

            DB::commit();

            session()->flash(
                'success',
                __('dashboard.response_item_create')
            );

        } catch (\Exception $e) {

            DB::rollBack();

            report($e);

            session()->flash(
                'error',
                __('dashboard.response_item_error_create')
            );

        }

        return redirect()->back();
    }


    public function update(
        Request $request,
        TemplateTheme $templateTheme
    ) {
        $request->validate([
            'path_image_logo_header' => [
                'nullable',
                'file',
                'image',
                'max:2048'
            ],

            'path_image_logo_footer' => [
                'nullable',
                'file',
                'image',
                'max:2048'
            ],
        ]);

        $data = $request->except([
            'path_image_logo_header',
            'path_image_logo_footer',
            'delete_path_image_logo_header',
            'delete_path_image_logo_footer',
        ]);

        $pathUpload = $this->getPathUpload();

        $manager = new ImageManager(
            new GdDriver()
        );

        try {

            DB::beginTransaction();

            /*
            |--------------------------------------------------------------------------
            | Atualizar Logo Header
            |--------------------------------------------------------------------------
            */

            if ($request->hasFile('path_image_logo_header')) {

                $file = $request->file(
                    'path_image_logo_header'
                );

                $mime = $file->getMimeType();

                $extension = strtolower(
                    $file->getClientOriginalExtension()
                );

                $isSvg = $mime === 'image/svg+xml'
                    || $extension === 'svg';

                /*
                |--------------------------------------------------------------------------
                | Salvar SVG
                |--------------------------------------------------------------------------
                */

                if ($isSvg) {

                    $filename = Str::uuid()->toString()
                        . '.svg';

                    Storage::disk('public')->putFileAs(
                        $pathUpload,
                        $file,
                        $filename
                    );

                } else {

                    /*
                    |--------------------------------------------------------------------------
                    | Converter para AVIF
                    |--------------------------------------------------------------------------
                    */

                    $filename = Str::uuid()->toString()
                        . '.avif';

                    $image = $manager
                        ->read($file)
                        ->resize(
                            null,
                            null,
                            function ($constraint) {

                                $constraint->aspectRatio();

                                $constraint->upsize();

                            }
                        )
                        ->toAvif(quality: 95)
                        ->toString();

                    Storage::disk('public')->put(
                        $pathUpload . $filename,
                        $image
                    );

                }

                /*
                |--------------------------------------------------------------------------
                | Remover imagem anterior
                |--------------------------------------------------------------------------
                */

                if (
                    !empty(
                        $templateTheme->path_image_logo_header
                    )
                    &&
                    Storage::disk('public')->exists(
                        $templateTheme->path_image_logo_header
                    )
                ) {

                    Storage::disk('public')->delete(
                        $templateTheme->path_image_logo_header
                    );

                }

                $data['path_image_logo_header'] =
                    $pathUpload . $filename;

            }

            /*
            |--------------------------------------------------------------------------
            | Remover Logo Header
            |--------------------------------------------------------------------------
            */

            elseif (
                $request->boolean(
                    'delete_path_image_logo_header'
                )
            ) {

                if (
                    !empty(
                        $templateTheme->path_image_logo_header
                    )
                    &&
                    Storage::disk('public')->exists(
                        $templateTheme->path_image_logo_header
                    )
                ) {

                    Storage::disk('public')->delete(
                        $templateTheme->path_image_logo_header
                    );

                }

                $data['path_image_logo_header'] = null;

            }


            /*
            |--------------------------------------------------------------------------
            | Atualizar Logo Footer
            |--------------------------------------------------------------------------
            */

            if ($request->hasFile('path_image_logo_footer')) {

                $file = $request->file(
                    'path_image_logo_footer'
                );

                $mime = $file->getMimeType();

                $extension = strtolower(
                    $file->getClientOriginalExtension()
                );

                $isSvg = $mime === 'image/svg+xml'
                    || $extension === 'svg';

                /*
                |--------------------------------------------------------------------------
                | Salvar SVG
                |--------------------------------------------------------------------------
                */

                if ($isSvg) {

                    $filename = Str::uuid()->toString()
                        . '_footer.svg';

                    Storage::disk('public')->putFileAs(
                        $pathUpload,
                        $file,
                        $filename
                    );

                } else {

                    /*
                    |--------------------------------------------------------------------------
                    | Converter para AVIF
                    |--------------------------------------------------------------------------
                    */

                    $filename = Str::uuid()->toString()
                        . '_footer.avif';

                    $image = $manager
                        ->read($file)
                        ->resize(
                            null,
                            null,
                            function ($constraint) {

                                $constraint->aspectRatio();

                                $constraint->upsize();

                            }
                        )
                        ->toAvif(quality: 95)
                        ->toString();

                    Storage::disk('public')->put(
                        $pathUpload . $filename,
                        $image
                    );

                }

                /*
                |--------------------------------------------------------------------------
                | Remover imagem anterior
                |--------------------------------------------------------------------------
                */

                if (
                    !empty(
                        $templateTheme->path_image_logo_footer
                    )
                    &&
                    Storage::disk('public')->exists(
                        $templateTheme->path_image_logo_footer
                    )
                ) {

                    Storage::disk('public')->delete(
                        $templateTheme->path_image_logo_footer
                    );

                }

                $data['path_image_logo_footer'] =
                    $pathUpload . $filename;

            }

            /*
            |--------------------------------------------------------------------------
            | Remover Logo Footer
            |--------------------------------------------------------------------------
            */

            elseif (
                $request->boolean(
                    'delete_path_image_logo_footer'
                )
            ) {

                if (
                    !empty(
                        $templateTheme->path_image_logo_footer
                    )
                    &&
                    Storage::disk('public')->exists(
                        $templateTheme->path_image_logo_footer
                    )
                ) {

                    Storage::disk('public')->delete(
                        $templateTheme->path_image_logo_footer
                    );

                }

                $data['path_image_logo_footer'] = null;

            }


            /*
            |--------------------------------------------------------------------------
            | Status
            |--------------------------------------------------------------------------
            */

            $data['active'] = $request->boolean('active')
                ? 1
                : 0;


            /*
            |--------------------------------------------------------------------------
            | Atualizar registro
            |--------------------------------------------------------------------------
            */

            $templateTheme->fill($data)->save();

            DB::commit();

            session()->flash(
                'success',
                __('dashboard.response_item_update')
            );

        } catch (\Exception $e) {

            DB::rollBack();

            report($e);

            session()->flash(
                'error',
                __('dashboard.response_item_error_update')
            );

        }

        return redirect()->back();
    }

    public function destroy(TemplateTheme $templateTheme)
    {
        Storage::delete(isset($templateTheme->path_image_logo_header)??$templateTheme->path_image_logo_header);
        Storage::delete(isset($templateTheme->path_image_logo_footer)??$templateTheme->path_image_logo_footer);
        $templateTheme->delete();
        Session::flash('success',__('dashboard.response_item_delete'));
        return redirect()->back();
    }
}
