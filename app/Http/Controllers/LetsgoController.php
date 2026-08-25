<?php

namespace App\Http\Controllers;

use App\Models\Letsgo;
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

class LetsgoController extends Controller
{
    protected $pathUpload = 'admin/uploads/images/lets-go/';
    public function index(ThemeManager $themeManager)
    {
        $settingTheme = (new SettingThemeRepository())->settingTheme();

        // Verifica permissão para visualizar slides
        $check = checkPermission('letsgo', 'sesssao lets go.visualizar', $settingTheme);
        if ($check !== true) {
            return $check; // retorna view 403
        }

        $letsgo = Letsgo::first();
        $theme = $themeManager;
        $themeData = $themeManager->theme();

        return view('admin.blades.letsgo.index', compact('letsgo', 'theme', 'themeData'));
    }

    public function store(Request $request)
    {
        $data = $request->except(['path_image', 'path_file']);
        $manager = new ImageManager(GdDriver::class);

        $request->validate([
            'path_image' => ['nullable', 'file', 'image', 'max:2048', 'mimes:jpg,jpeg,png,gif'],
        ]);

        if ($request->hasFile('path_image')) {
            $file = $request->file('path_image');
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

            $data['path_image'] = $this->pathUpload . $filename;
        }

        $data['active'] = $request->active ? 1 : 0;

        try {
            DB::beginTransaction();
            Letsgo::create($data);
            DB::commit();
            session()->flash('success', __('dashboard.response_item_create'));
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('error', __('dashboard.response_item_error_create'));
        }

        return redirect()->back();
    }

    public function update(Request $request, Letsgo $letsgo)
    {
        $data = $request->except('path_image');
        $manager = new ImageManager(GdDriver::class);

        $request->validate([
            'path_image' => ['nullable', 'file', 'image', 'max:2048', 'mimes:jpg,jpeg,png,gif']
        ]);

        // letsgo desktop
        if ($request->hasFile('path_image')) {
            $file = $request->file('path_image');
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

            Storage::delete(isset($letsgo->path_image)??$letsgo->path_image);
            $data['path_image'] = $this->pathUpload . $filename;
        }

        if (isset($request->delete_path_image)) {
            Storage::delete(isset($letsgo->path_image)??$letsgo->path_image);
            $data['path_image'] = null;
        }

        $data['active'] = $request->active ? 1 : 0;

        try {
            DB::beginTransaction();
            $letsgo->fill($data)->save();
            DB::commit();
            session()->flash('success', __('dashboard.response_item_update'));
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', __('dashboard.response_item_error_update'));
        }

        return redirect()->back();
    }

    public function destroy(Letsgo $letsgo)
    {
        Storage::delete(isset($letsgo->path_image)??$letsgo->path_image);
        $letsgo->delete();
        Session::flash('success',__('dashboard.response_item_delete'));
        return redirect()->back();
    }
}
