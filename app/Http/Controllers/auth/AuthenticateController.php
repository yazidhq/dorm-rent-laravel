<?php

namespace App\Http\Controllers\auth;

use App\Models\User;
use App\Models\Kamar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthenticateController extends Controller
{
    /**
     * Instantiate a new LoginRegisterController instance.
     */
    public function __construct()
    {
        $this->middleware('guest')->except(['logout', 'dashboard']);
    }

    /**
     * Display a registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        $data = [
            'title' => 'Register'
        ];
        return view('auth.register', $data);
    }

    /**
     * Store a new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'number' => 'required|string|max:15',
            'password' => 'required|min:8|confirmed',
            'role' => 'required'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->number = $request->number;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->save();

        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);

        $request->session()->regenerate();

        return redirect()->route('home');
    }


    /**
     * Display a login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        $data = [
            'title' => 'Login Page',
        ];
        return view('auth.login', $data);
    }

    /**
     * Authenticate the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if ($user && ($user->status == 'Tidak Aktif' || $user->status == NULL)) {
            return back()->withErrors(['email' => 'Akun Anda sudah tidak aktif.'])->onlyInput('email');
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (auth()->user()->role == 'admin') {
                return redirect()->route('dashboard');
            } else {
                return redirect()->route('home');
            }
        }

        return back()->withErrors(['email' => 'Terdapat inkonsistensi antara alamat email dan kata sandi.',])->onlyInput('email');
    }

    /**
     * Display a dashboard to authenticated users.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $data = [
            'title' => 'Dashboard',
            'user' => User::get(),
            'kamar' => Kamar::get()
        ];
        if (Auth::check()) {
            if (auth()->user()->role == 'admin') {
                return view('admin.index', $data);
            }
            return redirect()->route('home');
        }
        return redirect()->route('login')->withErrors(['email' => 'Please login to access the dashboard.'])->onlyInput('email');
    }

    /**
     * Log out the user from application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home')->withSuccess('You have logged out successfully!');;
    }
}
