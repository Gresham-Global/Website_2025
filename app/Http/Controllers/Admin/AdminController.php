<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;  // Import Auth facade
use Illuminate\Validation\ValidationException;


class AdminController extends Controller
{
    public function login(Request $request){
        $title = 'Gresham Global';
        return view('admin.login',compact('title'));
    }

    public function verify_login(Request $request)
    {
        // dd($request);
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('web')->attempt($credentials, $request->filled('remember'))) {
            $user = Auth::user();
            // Check if user_type matches the provided userType
            if ($user->user_type == 1) {
                $request->session()->regenerate();
                $request->session()->put('user_id', $user->id);
                $request->session()->put('user_type', $user->user_type);
                $request->session()->put('login_by', "admin");

                return redirect()->intended(url('admin/dashboard'));
            } else {
                // Log out the user if user_type does not match
                Auth::guard('web')->logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return back()->withErrors([
                    'userType' => 'The selected user type is invalid.',
                ]);
            }
        }

        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')],
        ]);
    }

    public function dashboard(){
        $title = 'Gresham Global';
        // dd(session()->all());
        $heading = 'Dashboard';
        return view('admin.dashboard',compact('title','heading'));
    }

    public function logout()
    {
        Auth::logout(); // Log the user out

        // Optionally, invalidate the user's session
        request()->session()->invalidate();

        // Regenerate the session token
        request()->session()->regenerateToken();

        // Redirect to the login page
        return redirect('/admin/login');
    }

}
