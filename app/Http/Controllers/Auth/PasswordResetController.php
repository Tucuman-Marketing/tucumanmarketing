<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\PasswordReset;

class PasswordResetController extends Controller
{

    public function index()
    {
        return view('auth.password.reset-password-link');
    }

    public function sendLink(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status == Password::RESET_LINK_SENT
                ? back()->with('success', 'Se ha enviado el enlace de restablecimiento de contraseña a su correo electrónico.')
                : back()->withInput($request->only('email'))
                        ->withErrors(['email' => __($status)]);
    }


    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.password.reset-password')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }


    public function update(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
        ], [
            'token.required' => 'El campo token es obligatorio.',
            'email.required' => 'El campo correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe ser una dirección de correo electrónico válida.',
            'password.required' => 'El campo contraseña es obligatorio.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
            'password.min' => 'La contraseña debe tener al menos 6 caracteres.',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->save();

                event(new PasswordReset($user));
            }
        );

        if ($status == Password::PASSWORD_RESET) {
            // La contraseña ha sido restablecida.
            return redirect()->route('login')->with('success', 'Tu contraseña ha sido restablecida correctamente.');
        } else {
            // Algo salió mal.
            return back()->withErrors(['email' => [__($status)]]);
        }
    }


}
