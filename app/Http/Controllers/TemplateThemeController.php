<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Helpers\HelperArchive;
use App\Models\TemplateTheme;
use App\Repositories\SettingThemeRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;
use Intervention\Image\ImageManager;
use RealRashid\SweetAlert\Facades\Alert;

class TemplateThemeController extends Controller
{
    protected $pathUpload = 'admin/uploads/images/templateTheme/';

    public function index()
    {
        $settingTheme = (new SettingThemeRepository())->settingTheme();

        // Verifica permissão para visualizar templateThemes
        // $check = checkPermission('templateTheme.visualizar', $settingTheme);
        // if ($check !== true) {
        //     return $check; // retorna view 403
        // }

        $templateTheme = TemplateTheme::where('active', 1)->first();
        // dd($templateTheme);
        return view('admin.blades.templateTheme.index', compact('templateTheme', 'settingTheme'));
    }

    public function store(Request $request)
    {
        $data = $request->except(['path_image_logo_header', 'path_image_logo_footer']);
        $helper = new HelperArchive();
        $manager = new ImageManager(GdDriver::class);
        
        $request->validate([
            'path_image_logo_header' => ['nullable', 'file', 'image', 'max:2048'],
            'path_image_logo_footer' => ['nullable', 'file', 'image', 'max:2048'],
        ]);

        // templateTheme desktop
        if ($request->hasFile('path_image_logo_header')) {
            $file = $request->file('path_image_logo_header');
            $mime = $file->getMimeType();
            $extension = $file->getClientOriginalExtension();
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '.webp';

            if ($mime === 'image/svg+xml' || $extension === 'svg') {
                Storage::putFileAs($this->pathUpload, $file, $filename);
            } else {
                try {
                    $image = $manager->read($file)
                        ->resize(null, null, function ($constraint) {
                            $constraint->aspectRatio();
                            $constraint->upsize();
                        })
                        ->toWebp(quality: 95)
                        ->toString();

                    Storage::put($this->pathUpload . $filename, $image);
                } catch (\Exception $e) {
                    // Fallback: salva o arquivo original
                    $originalName = $file->getClientOriginalName();
                    Storage::putFileAs($this->pathUpload, $file, $originalName);
                    $data['path_image_logo_header'] = $this->pathUpload . $originalName;
                    // Remove o continue e use um flag ou retorne
                    // continue; // REMOVA ESTA LINHA
                }
            }

            // Só define se não foi definido no catch
            if (!isset($data['path_image_logo_header'])) {
                $data['path_image_logo_header'] = $this->pathUpload . $filename;
            }
        }

        // templateTheme mobile - similar
        if ($request->hasFile('path_image_logo_footer')) {
            $fileMobile = $request->file('path_image_logo_footer');
            $mimeMobile = $fileMobile->getMimeType();
            $extensionMobile = $fileMobile->getClientOriginalExtension();
            $filenameMobile = pathinfo($fileMobile->getClientOriginalName(), PATHINFO_FILENAME) . '_mobile.webp';

            if ($mimeMobile === 'image/svg+xml' || $extensionMobile === 'svg') {
                Storage::putFileAs($this->pathUpload, $fileMobile, $filenameMobile);
            } else {
                try {
                    $imageMobile = $manager->read($fileMobile)
                        ->resize(null, null, function ($constraint) {
                            $constraint->aspectRatio();
                            $constraint->upsize();
                        })
                        ->toWebp(quality: 95)
                        ->toString();

                    Storage::put($this->pathUpload . $filenameMobile, $imageMobile);
                } catch (\Exception $e) {
                    $originalName = $fileMobile->getClientOriginalName();
                    Storage::putFileAs($this->pathUpload, $fileMobile, $originalName);
                    $data['path_image_logo_footer'] = $this->pathUpload . $originalName;
                }
            }

            if (!isset($data['path_image_logo_footer'])) {
                $data['path_image_logo_footer'] = $this->pathUpload . $filenameMobile;
            }
        }

        $data['active'] = $request->active ? 1 : 0;

        try {
            DB::beginTransaction();
            dd($data);
            TemplateTheme::create($data);
            DB::commit();
            session()->flash('success', __('dashboard.response_item_create'));
        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            Alert::error('Erro', __('dashboard.response_item_error_create'));
        }

        return redirect()->back();
    } 
    
    public function update(Request $request, TemplateTheme $templateTheme)
    {
        $data = $request->all();
        $helper = new HelperArchive();
        $manager = new ImageManager(GdDriver::class);

        // templateTheme desktop
        if ($request->hasFile('path_image_logo_header')) {
            $file = $request->file('path_image_logo_header');
            $mime = $file->getMimeType();
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '.webp';

            if ($mime === 'image/svg+xml') {
                Storage::putFileAs($this->pathUpload, $file, $filename);
            } else {
                $image = $manager->read($file)
                    ->resize(null, null, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })
                    ->toWebp(quality: 95)
                    ->toString();

                Storage::put($this->pathUpload . $filename, $image);
            }

            Storage::delete(isset($templateTheme->path_image)??$templateTheme->path_image);
            $data['path_image_logo_header'] = $this->pathUpload . $filename;
        }

        if (isset($request->delete_path_image)) {
            Storage::delete(isset($templateTheme->path_image)??$templateTheme->path_image);
            $data['path_image_logo_header'] = null;
        }

        // templateTheme mobile
        if ($request->hasFile('path_image_logo_footer')) {
            $fileMobile = $request->file('path_image_logo_footer');
            $mimeMobile = $fileMobile->getMimeType();
            $filenameMobile = pathinfo($fileMobile->getClientOriginalName(), PATHINFO_FILENAME) . '_mobile.webp';

            if ($mimeMobile === 'image/svg+xml') {
                Storage::putFileAs($this->pathUpload, $fileMobile, $filenameMobile);
            } else {
                $imageMobile = $manager->read($fileMobile)
                    ->resize(null, null, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })
                    ->toWebp(quality: 95)
                    ->toString();

                Storage::put($this->pathUpload . $filenameMobile, $imageMobile);
            }

            Storage::delete($templateTheme->path_image_logo_footer?$templateTheme->path_image_logo_footer:'');
            $data['path_image_logo_footer'] = $this->pathUpload . $filenameMobile;
        }

        if (isset($request->delete_path_image_logo_footer)) {
            Storage::delete($templateTheme->path_image_logo_footer?$templateTheme->path_image_logo_footer:'');
            $data['path_image_logo_footer'] = null;
        }

        $data['active'] = $request->active ? 1 : 0;

        try {
            DB::beginTransaction();
            // dd($data);
            $templateTheme->fill($data)->save();
            DB::commit();
            session()->flash('success', __('dashboard.response_item_update'));
        } catch (\Exception $e) {
            dd($e);
            DB::rollBack();
            Alert::error('Erro', __('dashboard.response_item_error_update'));
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
