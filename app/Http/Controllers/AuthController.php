<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function signupFormShow()
    {
        // Redirect if already logged in
        if (Auth::check()) {
            return redirect()->route('posts.index');
        }
        return view('auth.signup');
    }

    public function LoginFormShow()
    {
        // Redirect if already logged in
        if (Auth::check()) {
            return redirect()->route('posts.index');
        }
        return view('auth.login');
    }
    public function forgotPasswordFormShow()
    {
        // Redirect if already logged in
        if (Auth::check()) {
            return redirect()->route('posts.index');
        }
        return view('auth.forgot-password');
    }
    public function resetPasswordFormShow($token)
    {
        if (Auth::check()) {
            return redirect()->route('posts.index');
        }
        $user = User::where('remember_token',$token)->first();
        if(!$user) return back()->withErrors('Invalid token or Expired');
        
        return view('auth.reset-password', compact('user'));
    }
     
    public function register(Request $request)
    {
       $validated = $request->validate([
        'name' => 'required',
        'username' => 'required|unique:users,username',
        'email' => 'required|email|unique:users,email',
        'password' =>  'required|confirmed'
       ]);
       User::create($validated);
       Auth::attempt($validated);

       return redirect()->route('dashboard');
    }
    public function Login(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        if (Auth::attempt($validated))
        {
            $request->session()->regenerate();
            return redirect()->route('posts.index');
        }
        return back()->withErrors([
            'message' => 'Please check your credentials and try again'
        ]);
    }
    public function forgotPassword(Request $request){
        $validated = $request->validate([
            'email' => 'required|email|exists:users,email'
        ]);
    
        $status = Password::sendResetLink($validated);
    
        return $status === Password::RESET_LINK_SENT
            ? back()->with('success', __($status))
            : back()->withErrors(['email' => __($status)]);
    }
    public function resetPassword(Request $request)
    {
        $validated = $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|confirmed'
        ]);
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->save();
            }
        );
    
        if ($status == Password::PASSWORD_RESET) {
            return redirect()->route('login')->with('success', __($status));
        } else {
            return back()->withErrors(['email' => __($status)]);
        }
    }
    public function logout(Request $request){
        Auth::Logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
     
}
