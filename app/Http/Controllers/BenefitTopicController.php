<?php

namespace App\Http\Controllers;

use App\Models\BenefitTopic;
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

class BenefitTopicController extends Controller
{
    protected $pathUpload = 'admin/uploads/images/benefitTopic/';
    public function index(ThemeManager $themeManager)
    {
        $settingTheme = (new SettingThemeRepository())->settingTheme();

        // Verifica permissão para visualizar slides
        $check = checkPermission('benefits', 'parametro.visualizar', $settingTheme);
        if ($check !== true) {
            return $check; // retorna view 403
        }

        $benefitTopics = BenefitTopic::get();
        $theme = $themeManager;
        $themeData = $themeManager->theme();
        return view('admin.blades.benefitTopic.index', compact('benefitTopics', 'theme', 'themeData'));
    }


    public function store(Request $request)
    {
        $data = $request->except('path_image');
        $manager = new ImageManager(GdDriver::class);

        $request->validate([
            'path_image' => ['nullable', 'file', 'image', 'max:2048', 'mimes:jpg,jpeg,png,gif']
        ]);

        // benefitTopic desktop
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
            BenefitTopic::create($data);
            DB::commit();
            session()->flash('success', __('dashboard.response_item_create'));
        } catch (\Exception $e) {
            DB::rollback();
            Alert::error('Erro', __('dashboard.response_item_error_create'));
        }

        return redirect()->back();
    }

    public function update(Request $request, BenefitTopic $benefitTopic)
        {
        $data = $request->except('path_image');
        $manager = new ImageManager(GdDriver::class);

        $request->validate([
            'path_image' => ['nullable', 'file', 'image', 'max:2048', 'mimes:jpg,jpeg,png,gif']
        ]);
        $data['active'] = $request->active ? 1 : 0;
        // benefitTopic desktop
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

            Storage::delete(isset($benefitTopic->path_image)??$benefitTopic->path_image);
            $data['path_image'] = $this->pathUpload . $filename;
        }

        if (isset($request->delete_path_image)) {
            Storage::delete(isset($benefitTopic->path_image)??$benefitTopic->path_image);
            $data['path_image'] = null;
        }
        try {
            DB::beginTransaction();
                $benefitTopic->fill($data)->save();
            DB::commit();
            session()->flash('success', __('dashboard.response_item_update'));
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Alert::error('error', __('dashboard.response_item_error_update'));
            return redirect()->back();
        }
    }

    public function destroy(BenefitTopic $benefitTopic)
    {
        $benefitTopic->delete();
        Session::flash('success',__('dashboard.response_item_delete'));
        return redirect()->back();
    }

    public function destroySelected(Request $request)
    {    
        foreach ($request->deleteAll as $benefitTopicId) {
            $benefitTopic = BenefitTopic::find($benefitTopicId);
    
            if ($benefitTopic) {
                activity()
                    ->causedBy(Auth::user())
                    ->performedOn($benefitTopic)
                    ->event('multiple_deleted')
                    ->withProperties([
                        'attributes' => [
                            'id' => $benefitTopicId,
                            'title' => $benefitTopic->title,
                            'path_image' => $benefitTopic->path_image,
                            'sorting' => $benefitTopic->sorting,
                            'active' => $benefitTopic->active,
                            'event' => 'multiple_deleted',
                        ]
                    ])
                    ->log('multiple_deleted');
            } else {
                \Log::warning("Item com ID $benefitTopicId não encontrado.");
            }
        }
    
        $deleted = BenefitTopic::whereIn('id', $request->deleteAll)->delete();
    
        if ($deleted) {
            return Response::json(['status' => 'success', 'message' => $deleted . ' '.__('dashboard.response_item_delete')]);
        }
    
        return Response::json(['status' => 'error', 'message' => 'Nenhum item foi deletado.'], 500);
    }

    public function sorting(Request $request)
    {
        foreach($request->arrId as $sorting => $id) {
            $benefitTopic = BenefitTopic::find($id);
    
            if ($benefitTopic) {
                $benefitTopic->sorting = $sorting;
                $benefitTopic->save();
            } else {
                Log::warning("Item com ID $id não encontrado.");
            }

            if($benefitTopic) {
                activity()
                    ->causedBy(Auth::user())
                    ->performedOn($benefitTopic)
                    ->event('order_updated')
                    ->withProperties([
                        'attributes' => [
                            'id' => $id,
                            'title' => $benefitTopic->title,
                            'path_image' => $benefitTopic->path_image,
                            'sorting' => $benefitTopic->sorting,
                            'active' => $benefitTopic->active,
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
