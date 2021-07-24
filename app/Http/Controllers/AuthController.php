<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('home'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function login()
    {
      return view('login');
    }

    /**
     * Logout current user
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect(route('home'));
    }

    /**
     * Change the password for the current user
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function change_password(Request $request)
    {
        $user = Auth::user();
        $credentials = $request->validate([
            'current_password' => 'required|current_password',
            'new_password' => 'required|confirmed'
        ]);
        Auth::logoutOtherDevices($credentials['current_password']);
        $user->forceFill([
          'password' => Hash::make($credentials['new_password'])
        ])->setRememberToken(Str::random(60));
        $user->save();
        return redirect(route('home'));
    }

    /**
     * Change the email for the current user
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function change_email(Request $request)
    {
        $user = Auth::user();
        $credentials = $request->validate([
            'current_password' => 'required|current_password',
            'new_email' => 'required|confirmed'
        ]);
        $user->email = $credentials['new_email'];
        $user->save();
        return redirect(route('home'));
    }

    // /**
    //  * Send password reset mail
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function send_pw_reset_mail(Request $request)
    // {
    //   $request->validate(['email' => 'required|email']);
    //
    //   $status = Password::sendResetLink(
    //       $request->only('email')
    //   );
    //
    //   return $status === Password::RESET_LINK_SENT
    //               ? back()->with(['status' => __($status)])
    //               : back()->withErrors(['email' => __($status)]);
    // }
    //
    // /**
    //  * Show password reset form
    //  *
    //  * @param  $token
    //  * @return \Illuminate\Http\Response
    //  */
    // public function pw_reset_form($token)
    // {
    //   return view('pw_reset_form', ['token' => $token]);
    // }



}
