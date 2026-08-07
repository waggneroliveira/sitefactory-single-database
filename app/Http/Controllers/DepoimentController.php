<?php

namespace App\Http\Controllers;

use App\Models\Depoiment;
use App\Repositories\SettingThemeRepository;
use App\Services\ThemeManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;
use Intervention\Image\ImageManager;
use RealRashid\SweetAlert\Facades\Alert;

class DepoimentController extends Controller
{
    protected $pathUpload = 'admin/uploads/images/depoiment/';
    public function index(ThemeManager $theme)
    {
        $settingTheme = (new SettingThemeRepository())->settingTheme();

        // Verifica permissão para visualizar slides
        $check = checkPermission('depoimento.visualizar', $settingTheme);
        if ($check !== true) {
            return $check; // retorna view 403
        }

        $depoiments = Depoiment::sorting()->get();
        $themeData = $theme->theme();

        return view('admin.blades.depoiment.index', compact('depoiments', 'themeData'));
    }

    public function store(Request $request)
    {
        $data = $request->except('path_image');
        $manager = new ImageManager(GdDriver::class);

        $request->validate([
            'path_image' => ['nullable', 'file', 'image', 'max:2048', 'mimes:jpg,jpeg,png,gif']
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
            Depoiment::create($data);
            DB::commit();
            session()->flash('success', __('dashboard.response_item_create'));
        } catch (\Exception $e) {
            DB::rollback();
            Alert::error('Erro', __('dashboard.response_item_error_create'));
        }

        return redirect()->route('admin.dashboard.depoiment.index');
    }

    public function update(Request $request, Depoiment $depoiment)
    {
        $data = $request->except('path_image');
        $manager = new ImageManager(GdDriver::class);

        $request->validate([
            'path_image' => ['nullable', 'file', 'image', 'max:2048', 'mimes:jpg,jpeg,png,gif']
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

            Storage::delete(isset($depoiment->path_image)??$depoiment->path_image);
            $data['path_image'] = $this->pathUpload . $filename;
        }

        if (isset($request->delete_path_image)) {
            Storage::delete(isset($depoiment->path_image)??$depoiment->path_image);
            $data['path_image'] = null;
        }

        $data['active'] = $request->active ? 1 : 0;

        try {
            DB::beginTransaction();
            $depoiment->fill($data)->save();
            DB::commit();
            session()->flash('success', __('dashboard.response_item_update'));
        } catch (\Exception $e) {
            DB::rollBack();
            Alert::error('Erro', __('dashboard.response_item_error_update'));
        }

        return redirect()->route('admin.dashboard.depoiment.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Depoiment $depoiment)
    {
        Storage::delete(isset($depoiment->path_image)??$depoiment->path_image);
        $depoiment->delete();
        Session::flash('success',__('dashboard.response_item_delete'));
        return redirect()->back();
    }

        public function destroySelected(Request $request)
    {    
        foreach ($request->deleteAll as $depoimentId) {
            $depoiment = Depoiment::find($depoimentId);
    
            if ($depoiment) {
                activity()
                    ->causedBy(Auth::user())
                    ->performedOn($depoiment)
                    ->event('multiple_deleted')
                    ->withProperties([
                        'attributes' => [
                            'id' => $depoimentId,
                            'name' => $depoiment->name,
                            'function' => $depoiment->function,
                            'path_image' => $depoiment->path_image,
                            'text' => $depoiment->text,
                            'sorting' => $depoiment->sorting,
                            'active' => $depoiment->active,
                            'event' => 'multiple_deleted',
                        ]
                    ])
                    ->log('multiple_deleted');
            } else {
                \Log::warning("Item com ID $depoimentId não encontrado.");
            }
        }
    
        $deleted = Depoiment::whereIn('id', $request->deleteAll)->delete();
    
        if ($deleted) {
            return Response::json(['status' => 'success', 'message' => $deleted . ' '.__('dashboard.response_item_delete')]);
        }
    
        return Response::json(['status' => 'error', 'message' => 'Nenhum item foi deletado.'], 500);
    }

    public function sorting(Request $request)
    {
        foreach($request->arrId as $sorting => $id) {
            $depoiment = Depoiment::find($id);
    
            if ($depoiment) {
                $depoiment->sorting = $sorting;
                $depoiment->save();
            } else {
                Log::warning("Item com ID $id não encontrado.");
            }

            if($depoiment) {
                activity()
                    ->causedBy(Auth::user())
                    ->performedOn($depoiment)
                    ->event('order_updated')
                    ->withProperties([
                        'attributes' => [
                            'id' => $id,
                            'name' => $depoiment->name,
                            'function' => $depoiment->function,
                            'path_image' => $depoiment->path_image,
                            'text' => $depoiment->text,
                            'sorting' => $depoiment->sorting,
                            'active' => $depoiment->active,
                            'event' => 'order_updated',
                        ]
                    ])
                    ->log('order_updated');
            } else {
                \Log::warning("Item com ID $id não encontrado.");
            }
        }
    
        return Response::json(['status' => 'success']);
    }
}
