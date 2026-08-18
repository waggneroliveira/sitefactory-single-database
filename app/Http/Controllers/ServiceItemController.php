<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Helpers\HelperArchive;
use App\Models\ServiceItem;
use App\Models\ServiceSection;
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

class ServiceItemController extends Controller
{
    protected $pathUpload = 'admin/uploads/images/services/';
    public function index(ThemeManager $themeManager)
    {
        $settingTheme = (new SettingThemeRepository())->settingTheme();

        // 'slides' → é o módulo definido no template_modules.php.
        // 'slide.visualizar' → é a permissão definida no module_permissions.php.
        $check = checkPermission('services', 'servicos.visualizar', $settingTheme);
        if ($check !== true) {
            return $check; 
        }
        $theme = $themeManager;
        $themeData = $themeManager->theme();
        $serviceItems = ServiceItem::get();
        $serviceItemLimit = $themeManager->getLimit('services', 0);
        $serviceSection = ServiceSection::whereIn('section', ['service', 'gallery'])
        ->get()
        ->keyBy('section');
        
        return view('admin.blades.serviceItems.index',compact('serviceItems','serviceSection', 'serviceItemLimit', 'theme', 'themeData'));
    }

    public function store(Request $request, ThemeManager $themeManager)
    {
        $request->validate([
            'path_image' => ['nullable', 'file', 'image', 'max:2048', 'mimes:jpg,jpeg,png,gif'],
            'path_icon' => ['nullable', 'file', 'image', 'max:2048', 'mimes:jpg,jpeg,png,gif'],
        ]);

        $limit = $themeManager->getLimit('services', 0);
        $currentCount = ServiceItem::count();

        if ($limit !== null && $currentCount >= $limit) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors([
                    'limit' => "O limite de {$limit} serviços foi atingido."
                ]);
        }

        $data = $request->except(['path_image', 'path_icon']);
        $helper = new HelperArchive();
        $manager = new ImageManager(GdDriver::class);

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

        if ($request->hasFile('path_icon')) {
            $fileMobile = $request->file('path_icon');
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

            $data['path_icon'] = $this->pathUpload . $filenameMobile;
        }

        $data['active'] = $request->active ? 1 : 0;

        try {
            DB::beginTransaction();
            ServiceItem::create($data);
            DB::commit();
            session()->flash('success', __('dashboard.response_item_create'));
        } catch (\Exception $e) {
            dd($e);
            DB::rollBack();
            Alert::error('Erro', __('dashboard.response_item_error_create'));
        }

        return redirect()->back();
    }

    public function update(Request $request, ServiceItem $serviceItem)
    {
        $request->validate([
            'path_image' => ['nullable', 'file', 'image', 'max:2048', 'mimes:jpg,jpeg,png,gif'],
            'path_icon' => ['nullable', 'file', 'image', 'max:2048', 'mimes:jpg,jpeg,png,gif'],
        ]);

        $data = $request->except(['path_image', 'path_icon']);
        $helper = new HelperArchive();
        $manager = new ImageManager(GdDriver::class);

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

        if ($request->hasFile('path_icon')) {
            $fileMobile = $request->file('path_icon');
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

            $data['path_icon'] = $this->pathUpload . $filenameMobile;
        }

        $data['active'] = $request->active ? 1 : 0;

        try {
            DB::beginTransaction();
            $serviceItem->fill($data)->save();
            DB::commit();
            session()->flash('success', __('dashboard.response_item_update'));
        } catch (\Exception $e) {
            DB::rollBack();
            Alert::error('Erro', __('dashboard.response_item_error_update'));
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServiceItem $serviceItem)
    {
        Storage::delete(isset($serviceItem->path_image)??$serviceItem->path_image);
        Storage::delete(isset($serviceItem->path_icon)??$serviceItem->path_icon);
        $serviceItem->delete();
        Session::flash('success',__('dashboard.response_item_delete'));
        return redirect()->back();
    }

    public function destroySelected(Request $request)
    {
        foreach ($request->deleteAll as $serviceItemId) {
            $serviceItem = ServiceItem::find($serviceItemId);

            if ($serviceItem) {
                activity()
                    ->causedBy(Auth::user())
                    ->performedOn($serviceItem)
                    ->event('multiple_deleted')
                    ->withProperties([
                        'attributes' => [
                            'id' => $serviceItemId,
                            'title' => $serviceItem->title,
                            'description' => $serviceItem->description,
                            'text' => $serviceItem->text,
                            'path_image' => $serviceItem->path_image,
                            'path_icon' => $serviceItem->path_icon,
                            'link' => $serviceItem->link,
                            'scroll_section' => $serviceItem->scroll_section,
                            'active' => $serviceItem->active,
                            'event' => 'multiple_deleted',
                        ]
                    ])
                    ->log('multiple_deleted');
            } else {
                \Log::warning("Item com ID $serviceItemId não encontrado.");
            }
        }

        $deleted = ServiceItem::whereIn('id', $request->deleteAll)->delete();

        if ($deleted) {
            return Response::json([
                'status' => 'success',
                'message' => $deleted . ' ' . __('dashboard.response_item_delete')
            ]);
        }

        return Response::json([
            'status' => 'error',
            'message' => 'Nenhum item foi deletado.'
        ], 500);
    }

    public function sorting(Request $request)
    {
        foreach ($request->arrId as $sorting => $id) {
            $serviceItem = ServiceItem::find($id);

            if ($serviceItem) {
                $serviceItem->sorting = $sorting;
                $serviceItem->save();

                activity()
                    ->causedBy(Auth::user())
                    ->performedOn($serviceItem)
                    ->event('order_updated')
                    ->withProperties([
                        'attributes' => [
                            'id' => $id,
                            'title' => $serviceItem->title,
                            'description' => $serviceItem->description,
                            'text' => $serviceItem->text,
                            'path_image' => $serviceItem->path_image,
                            'path_icon' => $serviceItem->path_icon,
                            'link' => $serviceItem->link,
                            'scroll_section' => $serviceItem->scroll_section,
                            'active' => $serviceItem->active,
                            'sorting' => $serviceItem->sorting,
                            'event' => 'order_updated',
                        ]
                    ])
                    ->log('order_updated');
            } else {
                Log::warning("Item com ID $id não encontrado.");
            }
        }

        return Response::json([
            'status' => 'success'
        ]);
    }
}
