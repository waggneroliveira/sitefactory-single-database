<?php

namespace App\Http\Controllers;

use App\Models\Report;
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

class ReportController extends Controller
{
    protected $pathUpload = 'admin/uploads/images/report/';
    public function index(ThemeManager $theme)
    {
        $settingTheme = (new SettingThemeRepository())->settingTheme();

        // Verifica permissão para visualizar slides
        $check = checkPermission('missao visao e valores.visualizar', $settingTheme);
        if ($check !== true) {
            return $check; // retorna view 403
        }
        $reports = Report::get();
        $themeData = $theme->theme();
        return view('admin.blades.report.index', compact('reports', 'themeData'));
    }

   
    public function store(Request $request)
    {
        $data = $request->except(['path_image', 'path_file']);
        $manager = new ImageManager(GdDriver::class);

        $request->validate([
            'path_image' => ['nullable', 'file', 'image', 'max:2048', 'mimes:jpg,jpeg,png,gif'],
            'path_file' => ['nullable', 'file', 'image', 'max:2048', 'mimes:jpg,jpeg,png,gif'] 
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

        //icone
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
            Report::create($data);
            DB::commit();
            session()->flash('success', __('dashboard.response_item_create'));
        } catch (\Exception $e) {
            DB::rollback();
            Alert::error('Erro', __('dashboard.response_item_error_create'));
        }

        return redirect()->back();
    }

   
    public function update(Request $request, Report $report)
    {
        $data = $request->except(['path_image', 'path_file']);
        $manager = new ImageManager(GdDriver::class);

        $request->validate([
            'path_image' => ['nullable', 'file', 'image', 'max:2048', 'mimes:jpg,jpeg,png,gif'],
            'path_file' => ['nullable', 'file', 'image', 'max:2048', 'mimes:jpg,jpeg,png,gif'] 
        ]);

        // report desktop
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

            Storage::delete(isset($report->path_image)??$report->path_image);
            $data['path_image'] = $this->pathUpload . $filename;
        }

        if (isset($request->delete_path_image)) {
            Storage::delete(isset($report->path_image)??$report->path_image);
            $data['path_image'] = null;
        }

        //icone
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

            Storage::delete(isset($report->path_file)??$report->path_file);
            $data['path_file'] = $this->pathUpload . $filename;
        }

        if (isset($request->delete_path_file)) {
            Storage::delete(isset($report->path_file)??$report->path_file);
            $data['path_file'] = null;
        }

        $data['active'] = $request->active ? 1 : 0;

        try {
            DB::beginTransaction();
            $report->fill($data)->save();
            DB::commit();
            session()->flash('success', __('dashboard.response_item_update'));
        } catch (\Exception $e) {
            DB::rollBack();
            Alert::error('Erro', __('dashboard.response_item_error_update'));
        }

        return redirect()->back();
    }

    public function destroy(Report $report)
    {
        Storage::delete(isset($report->path_image)??$report->path_image);
        Storage::delete(isset($report->path_file)??$report->path_file);
        $report->delete();
        Session::flash('success',__('dashboard.response_item_delete'));
        return redirect()->back();
    }
}
