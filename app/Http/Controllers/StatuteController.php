<?php

namespace App\Http\Controllers;

use App\Models\Statute;
use App\Repositories\SettingThemeRepository;
use App\Services\ThemeManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;
use Intervention\Image\ImageManager;
use RealRashid\SweetAlert\Facades\Alert;


class StatuteController extends Controller
{

    protected $pathUpload = 'admin/uploads/images/statute/';
    public function index(ThemeManager $theme)
    {
        $settingTheme = (new SettingThemeRepository())->settingTheme();

        // Verifica permissão para visualizar slides
        $check = checkPermission('passo a passo.visualizar', $settingTheme);
        if ($check !== true) {
            return $check; // retorna view 403
        }

        $statute = Statute::first();
        $themeData = $theme->theme();
        return view('admin.blades.statute.index', compact('statute', 'themeData'));
    }

    public function store(Request $request)
    {
        $data = $request->except('path_file');
        $manager = new ImageManager(GdDriver::class);

        $request->validate([
            'path_file' => ['nullable', 'file', 'image', 'max:3072', 'mimes:jpg,jpeg,png,gif'],
        ]);

        // statute desktop
        if ($request->hasFile('path_file')) {
            $file = $request->file('path_file');
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

            $data['path_file'] = $this->pathUpload . $filename;
        }

        $data['active'] = $request->active ? 1 : 0;

        try {
            DB::beginTransaction();
            Statute::create($data);
            DB::commit();
            session()->flash('success', __('dashboard.response_item_create'));
        } catch (\Exception $e) {
            DB::rollback();
            Alert::error('Erro', __('dashboard.response_item_error_create'));
        }

        return redirect()->back();
    }

    public function update(Request $request, Statute $statute)
    {
        $data = $request->except('path_file');
        $manager = new ImageManager(GdDriver::class);

        $request->validate([
            'path_file' => ['nullable', 'file', 'image', 'max:3072', 'mimes:jpg,jpeg,png,gif'],
        ]);

        // Se veio um novo arquivo
        if ($request->hasFile('path_file')) {
            $file = $request->file('path_file');
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

            Storage::delete(isset($statute->path_file)??$statute->path_file);
            $data['path_file'] = $this->pathUpload . $filename;
        }

        // Se o usuário pediu para remover via Dropify
        if ($request->has('delete_path_file')) {
            if (!empty($statute->path_file) && Storage::exists($statute->path_file)) {
                Storage::delete($statute->path_file);
            }
            $data['path_file'] = null;
        }

        $data['active'] = $request->active ? 1 : 0;

        try {
            DB::beginTransaction();
            $statute->fill($data)->save();
            DB::commit();
            session()->flash('success', __('dashboard.response_item_update'));
        } catch (\Exception $e) {
            DB::rollBack();
            Alert::error('Erro', __('dashboard.response_item_error_update'));
        }

        return redirect()->back();
    }

    public function destroy(Statute $statute)
    {
        Storage::delete(isset($statute->path_file)??$statute->path_file);
        $statute->delete();
        Session::flash('success',__('dashboard.response_item_delete'));
        return redirect()->back();
    }
}
