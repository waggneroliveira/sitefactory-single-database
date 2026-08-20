<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Tenant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Multitenancy\Actions\MakeTenantCurrentAction;

class AuthController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $credentials['active'] = 1;

        // Verifica se o usuário marcou "Manter conectado"
        $remember = $request->boolean('remember');

        /*
        |--------------------------------------------------------------------------
        | Tentativa de login
        |--------------------------------------------------------------------------
        |
        | O segundo parâmetro do Auth::attempt() é responsável pelo
        | "remember me" do Laravel.
        |
        */
        if (!Auth::attempt($credentials, $remember)) {

            $user = User::where('email', $request->email)
                ->active()
                ->first();

            if (!$user) {
                return back()->withErrors([
                    'email' => 'E-mail inválido ou usuário inativo.',
                ])->withInput();
            }

            if (!Hash::check($request->password, $user->password)) {
                return back()->withErrors([
                    'password' => 'Senha inválida.',
                ])->withInput();
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Regenera a sessão após autenticação
        |--------------------------------------------------------------------------
        */
        $request->session()->regenerate();

        $userAuthenticate = Auth::user();

        $user = User::find($userAuthenticate->id);

        /*
        |--------------------------------------------------------------------------
        | Define o Tenant atual
        |--------------------------------------------------------------------------
        */
        if ($user->tenant_id) {

            $tenant = Tenant::find($user->tenant_id);

            if ($tenant) {
                app(MakeTenantCurrentAction::class)->execute($tenant);
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Log de login
        |--------------------------------------------------------------------------
        */
        if (!$user->hasRole('Super')) {

            activity()
                ->causedBy(Auth::user())
                ->performedOn($user)
                ->event('login')
                ->withProperties([
                    'attributes' => [
                        'id' => $userAuthenticate->id,
                        'name' => $userAuthenticate->name,
                        'email' => $userAuthenticate->email,
                        'active' => $userAuthenticate->active,
                        'path_image' => $userAuthenticate->path_image,
                        'remember_token' => $userAuthenticate->remember_token,
                        'email_verified_at' => $userAuthenticate->email_verified_at,
                        'remember' => $remember,
                        'event' => 'login',
                    ]
                ])
                ->log('login');
        }

        /*
        |--------------------------------------------------------------------------
        | Mensagem de sucesso
        |--------------------------------------------------------------------------
        */
        session()->flash('success', 'Login realizado com sucesso!');

        return redirect()->intended('painel/dashboard');
    }

    public function logout(Request $request)
    {
        $userAuthenticate = Auth::user();

        $user = User::select('id', 'name', 'email')
            ->find($userAuthenticate->id);

        /*
        |--------------------------------------------------------------------------
        | Log de logout
        |--------------------------------------------------------------------------
        */
        if (!$user->hasRole('Super')) {

            activity()
                ->causedBy($userAuthenticate)
                ->performedOn($user)
                ->event('logout')
                ->withProperties([
                    'attributes' => [
                        'id' => $userAuthenticate->id,
                        'name' => $userAuthenticate->name,
                        'email' => $userAuthenticate->email,
                        'event' => 'logout',
                    ]
                ])
                ->log('logout');
        }

        /*
        |--------------------------------------------------------------------------
        | Logout
        |--------------------------------------------------------------------------
        */
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()
            ->route('admin.dashboard.painel')
            ->with('success', 'Logout realizado com sucesso!');
    }
}