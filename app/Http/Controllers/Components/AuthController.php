<?php

namespace App\Http\Controllers\Components;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $usernameOrEmail = $request->input('username_or_email');
        $password = $request->input('password');
        $remember = $request->has('remember');

        $credentials = [];
        if (filter_var($usernameOrEmail, FILTER_VALIDATE_EMAIL)) {
            $credentials['email'] = $usernameOrEmail;
        } else {
            $credentials['username'] = $usernameOrEmail;
        }
        $credentials['password'] = $password;

        if (Auth::attempt($credentials, $remember)) {
            return $this->redirectToDashboard();
        }

        return redirect('/auth/login')->with('error', 'Invalid credentials');
    }

    public function redirectToDashboard()
    {
        // dd(Auth::user());
        $roleCode = Auth::user()->role_code;
        $name = Auth::user()->first_name . ' ' . Auth::user()->last_name;

        if ($roleCode === '101') {
            $roleName = 'Developer';
        } elseif ($roleCode === '102') {
            $roleName = 'Admin';
        } elseif ($roleCode === '103') {
            $roleName = 'User';
        } else {
            $roleName = 'Guest';
        }

        if ($roleCode === '101') {
            session(['role' => $roleName, 'name' => $name]);
            return redirect('/developer/dashboard');
        } elseif ($roleCode === '102') {
            session(['role' => $roleName, 'name' => $name]);
            return redirect('/admin/dashboard');
        } elseif ($roleCode === '103') {
            session(['role' => $roleName, 'name' => $name]);
            return redirect('/user/dashboard');
        } else {
            session(['role' => $roleName, 'name' => $name]);
            return redirect('/dashboard');
        }
        return redirect('/dashboard');
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/auth/login')->with('error', 'You have been successfully logged out.');
    }

    public function showRegistrationForm()
    {
        $departments = Department::all();
        $roles = Roles::all();

        return view('auth.register', compact('departments', 'roles'));
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'role_code' => 'required|string|max:255',
            'department_code' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:2|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'role_code' => $request->role_code,
            'department_code' => $request->department_code,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'userpassword' => $request->password,
            'remember_token' => Str::random(10),
        ]);

        Auth::login($user);

        return $this->redirectToDashboard();
    }

    public function showResetForm()
    {
        return view('auth.reset');
    }

    public function reset(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:2|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $user = User::where('username', $request->username)
            ->where('email', $request->email)
            ->first();

        if ($user) {
            if (password_verify($request->password, $user->password)) {
                $user->password = bcrypt($request->password);
                $user->userpassword = $request->password;
                $user->save();
                return redirect('/auth/login')->with('success', 'Password reset successfully.');
            } else {
                return redirect('/auth/login')->with('error', 'Invalid password confirmation.');
            }
        } else {
            return redirect('/auth/login')->with('error', 'Username or email not found.');
        }
    }


    public function block()
    {
        $role = Auth::user()->role_code;

        if ($role === '101') {
            $dashboardLink = route('developer.dashboard');
        } elseif ($role === '102') {
            $dashboardLink = route('admin.dashboard');
        } elseif ($role === '103') {
            $dashboardLink = route('user.dashboard');
        } else {
            $dashboardLink = route('dashboard');
        }

        return view('auth.block', compact('dashboardLink'));
    }
}
