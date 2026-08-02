<?php

namespace App\Modules\User\Presentation\Controllers;

use App\Http\Requests\RequestStoreUser;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use App\Modules\User\Business\UserService;
use App\Repositories\UserPermissionRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;

class UserController
{
    public function __construct(protected UserService $service)
    {
    }

    public function index(UserPermissionRepository $userPermissionRepository): View|RedirectResponse
    {
        $data = $this->service->getIndexData($userPermissionRepository);
        if (isset($data['forbidden'])) {
            return $data['forbidden'];
        }

        return view('admin.blades.user.index', $data);
    }

    public function store(RequestStoreUser $request): RedirectResponse
    {
        try {
            $this->service->store($request);
            session()->flash('success', __('dashboard.response_item_create'));
            return redirect()->route('admin.dashboard.user.index');
        } catch (\Throwable $e) {
            session()->flash('error', __('dashboard.response_item_error_create'));
            return redirect()->back();
        }
    }

    public function edit(UserPermissionRepository $usersWithPermissionsForEdit, User $user): View|RedirectResponse
    {
        $data = $this->service->getEditData($usersWithPermissionsForEdit, $user);
        if (isset($data['forbidden'])) {
            return $data['forbidden'];
        }

        return view('admin.blades.user.edit', $data);
    }

    public function update(UserUpdateRequest $request, User $user): RedirectResponse
    {
        try {
            $this->service->update($request, $user);
            session()->flash('success', __('dashboard.response_item_update'));
            return redirect()->route('admin.dashboard.user.index');
        } catch (\Throwable $e) {
            session()->flash('error', __('dashboard.response_item_error_update'));
            return redirect()->back();
        }
    }

    public function destroy(User $user): RedirectResponse
    {
        try {
            $this->service->delete($user);
            Session::flash('success', __('dashboard.response_item_delete'));
            return redirect()->back();
        } catch (\Throwable $e) {
            Session::flash('error', 'Acesso negado');
            return redirect()->back();
        }
    }

    public function destroySelected(Request $request)
    {
        $result = $this->service->destroySelected($request);
        if (isset($result['forbidden'])) {
            return view('admin.error.403');
        }

        return Response::json(['status' => 'success', 'message' => $result['deleted'] . ' ' . __('dashboard.response_item_delete')]);
    }

    public function sorting(Request $request)
    {
        $this->service->sorting($request);
        return Response::json(['status' => 'success']);
    }
}
