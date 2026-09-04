<?php

namespace App\Http\Controllers;

use App\Models\Advantage;
use App\Repositories\SettingThemeRepository;
use App\Services\ThemeManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Imagick\Driver as ImagickDriver;
use Intervention\Image\ImageManager;

class AdvantageController extends Controller
{
    protected function getPathUpload(): string
    {
        $themeManager = app(ThemeManager::class);

        $template = $themeManager->current() ?? 'default';
        $variation = $themeManager->variation() ?? 'default';

        return "admin/uploads/images/templates/{$template}/{$variation}/advantage/";
    }
    public function index(ThemeManager $themeManager)
    {
        $settingTheme = (new SettingThemeRepository())->settingTheme();

        // 'slides' → é o módulo definido no template_modules.php.
        // 'slide.visualizar' → é a permissão definida no module_permissions.php.
        $check = checkPermission('advantage', 'vantagens.visualizar', $settingTheme);
        if ($check !== true) {
            return $check; // retorna view 403
        }

        $advantages = Advantage::sorting()->get();
        $theme = $themeManager;
        $themeData = $themeManager->theme();
        $advantageLimit = $themeManager->getLimit('advantage', 0);

        return view('admin.blades.advantage.index', compact('advantageLimit', 'advantages', 'theme', 'themeData'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'path_image' => ['nullable','file','image','max:2048'],
        ]);

        $data = $request->except([
            'path_image'
        ]);

        $pathUpload = $this->getPathUpload();

        $manager = new ImageManager(new ImagickDriver());

        // Imagem do advantage
        if ($request->hasFile('path_image')) {

            $file = $request->file('path_image');

            $mime = $file->getMimeType();

            if ($mime === 'image/svg+xml') {

                $filename = Str::uuid() . '.svg';

                Storage::putFileAs(
                    $pathUpload,
                    $file,
                    $filename
                );

            } else {

                $filename = Str::uuid() . '.avif';

                $image = $manager
                    ->read($file)
                    ->toAvif(quality: 90)
                    ->toString();

                Storage::put(
                    $pathUpload . $filename,
                    $image
                );
            }

            $data['path_image'] = $pathUpload . $filename;
        }

        $data['active'] = $request->active ? 1 : 0;

        try {

            DB::beginTransaction();

            Advantage::create($data);

            DB::commit();

            session()->flash(
                'success',
                __('dashboard.response_item_create')
            );

        } catch (\Exception $e) {
            DB::rollBack();

            session()->flash(
                'error',
                __('dashboard.response_item_error_create')
            );
        }

        return redirect()
            ->route('admin.dashboard.advantage.index');
    }

    public function update(Request $request, Advantage $advantage)
    {
        $request->validate([
            'path_image' => ['nullable','file','image','max:2048']
        ]);

        $data = $request->except([
            'path_image'
        ]);

        $pathUpload = $this->getPathUpload();

        $manager = new ImageManager(new ImagickDriver());

        // advantage image
        if ($request->hasFile('path_image')) {

            $file = $request->file('path_image');

            $mime = $file->getMimeType();

            if ($mime === 'image/svg+xml') {

                $filename = Str::uuid() . '.svg';

                Storage::putFileAs(
                    $pathUpload,
                    $file,
                    $filename
                );

            } else {

                $filename = Str::uuid() . '.avif';

                $image = $manager
                    ->read($file)
                    ->toAvif(quality: 90)
                    ->toString();

                Storage::put(
                    $pathUpload . $filename,
                    $image
                );
            }

            // Remove a imagem antiga somente após salvar a nova
            if (!empty($advantage->path_image)) {
                Storage::delete($advantage->path_image);
            }

            $data['path_image'] = $pathUpload . $filename;
        }

        // Remove imagem somente quando não houver novo upload
        if (
            $request->filled('delete_path_image') &&
            !$request->hasFile('path_image')
        ) {

            if (!empty($advantage->path_image)) {
                Storage::delete($advantage->path_image);
            }

            $data['path_image'] = null;
        }

        $data['active'] = $request->active ? 1 : 0;

        try {

            DB::beginTransaction();

            $advantage->fill($data)->save();

            DB::commit();

            session()->flash(
                'success',
                __('dashboard.response_item_update')
            );

        } catch (\Exception $e) {

            DB::rollBack();

            session()->flash(
                'error',
                __('dashboard.response_item_error_update')
            );
        }

        return redirect()->route('admin.dashboard.advantage.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Advantage $advantage)
    {
        Storage::delete(isset($advantage->path_image)??$advantage->path_image);
        $advantage->delete();
        Session::flash('success',__('dashboard.response_item_delete'));
        return redirect()->back();
    }

    public function destroySelected(Request $request)
    {    
        foreach ($request->deleteAll as $advantageId) {
            $advantage = Advantage::find($advantageId);
    
            if ($advantage) {
                activity()
                    ->causedBy(Auth::user())
                    ->performedOn($advantage)
                    ->event('multiple_deleted')
                    ->withProperties([
                        'attributes' => [
                            'id' => $advantageId,
                            'tag' => $advantage->tag,
                            'title' => $advantage->title,
                            'text' => $advantage->text,
                            'path_image' => $advantage->path_image,
                            'active' => $advantage->active,
                            'sorting' => $advantage->sorting,
                            'event' => 'multiple_deleted',
                        ]
                    ])
                    ->log('multiple_deleted');
            } else {
                \Log::warning("Item com ID $advantageId não encontrado.");
            }
        }
    
        $deleted = Advantage::whereIn('id', $request->deleteAll)->delete();
    
        if ($deleted) {
            return Response::json(['status' => 'success', 'message' => $deleted . ' '.__('dashboard.response_item_delete')]);
        }
    
        return Response::json(['status' => 'error', 'message' => 'Nenhum item foi deletado.'], 500);
    }

    public function sorting(Request $request)
    {
        foreach($request->arrId as $sorting => $id) {
            $advantage = Advantage::find($id);
    
            if ($advantage) {
                $advantage->sorting = $sorting;
                $advantage->save();
            } else {
                Log::warning("Item com ID $id não encontrado.");
            }

            if($advantage) {
                activity()
                    ->causedBy(Auth::user())
                    ->performedOn($advantage)
                    ->event('order_updated')
                    ->withProperties([
                        'attributes' => [
                            'id' => $id,
                            'tag' => $advantage->tag,
                            'title' => $advantage->title,
                            'text' => $advantage->text,
                            'path_image' => $advantage->path_image,
                            'active' => $advantage->active,
                            'sorting' => $advantage->sorting,
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
