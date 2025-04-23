<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthSessionController extends Controller
{
    public function index(){
        if (Auth::check()) {
            // Si el usuario ya está autenticado, redirige a la ruta deseada (por ejemplo, dashboard)
            return redirect()->route('admin.blogs.posts.index'); // Cambia 'admin.dashboard' por la ruta a la que deseas redirigir a los usuarios autenticados.
        }

        // Si el usuario no está autenticado, muestra el formulario de inicio de sesión
        return view('auth.login');
    }

    public function create()
    {
        return view('layouts.theme-admin.volgh.login.login');
        //return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        // $request->authenticate();
        // $user = Auth::user();
        // $user->audits();
        // $request->session()->regenerate();
        // return redirect()->intended(RouteServiceProvider::HOME);

        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $user = $request->user();

            return redirect()->route('admin.blogs.posts.index');

        } else {
            // Si la autenticación falla, redirige de vuelta al formulario de inicio de sesión
            return redirect()->back()->withInput()->withErrors(['email' => 'Estas credenciales no coinciden con nuestros registros.']);
        }
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
