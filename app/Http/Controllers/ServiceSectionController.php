<?php

namespace App\Http\Controllers;

use App\Models\ServiceSection;
use App\Repositories\SettingThemeRepository;
use App\Services\ThemeManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ServiceSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ThemeManager $themeManager)
    {

    $settingTheme = (new SettingThemeRepository())->settingTheme();

        // Verifica permissão para visualizar slides
        // $check = checkPermission('sesssao faq.visualizar', $settingTheme);
        // if ($check !== true) {
        //     return $check; 
        // }
        $theme = $themeManager;
        $themeData = $themeManager->theme();
        $serviceSection = ServiceSection::active()->first();

        return view('admin.blades.sessaoFaq.index',compact('serviceSection', 'theme', 'themeData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $data['active'] = $request->active ? 1 : 0;

        try {
            DB::beginTransaction();
            ServiceSection::create($data);
            DB::commit();
            session()->flash('success', __('dashboard.response_item_create'));
        } catch (\Exception $e) {
            DB::rollback();
            Alert::error('Erro', __('dashboard.response_item_error_create'));
        }

        return redirect()->back();
    }

    public function update(Request $request, ServiceSection $serviceSection)
    {
        $data = $request->all();
        $data['active'] = $request->active ? 1 : 0;

        try {
            DB::beginTransaction();
            $serviceSection->fill($data)->save();
            DB::commit();
            session()->flash('success', __('dashboard.response_item_update'));
        } catch (\Exception $e) {
            DB::rollback();
            Alert::error('Erro', __('dashboard.response_item_error_update'));
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServiceSection $serviceSection)
    {
        $serviceSection->delete();
        Session::flash('success',__('dashboard.response_item_delete'));
        return redirect()->back();
    }
}
