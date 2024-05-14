<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function registerUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:superadmin,user',
            
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            
        ]);

        if ($request->role == 'superadmin') {
            $user->assignRole('superadmin');
        } else {
            $user->assignRole('user');
        }

        if ($user) {
            return redirect()->route('register.daftar')
                ->with('success', 'User created successfully');
        } else {
            return redirect()->route('register.daftar')
                ->with('error', 'Failed to create user');
        }
    }

    public function login()
    {
        return view('login');
    }

    public function loginUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('login')
                ->withErrors($validator)
                ->withInput();
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->route('product.create');
        } else {
            return redirect()->route('login')
                ->with('error', 'Login failed: email or password is incorrect');
        }
    }
    public function logoutuser(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
    public function dashboard()
    {
        $user = Auth::user();

        // get user role
        // dd($user->roles[0]->name);
        
        // change role
        // $user->roles()->detach();
        // $user->assignRole('superadmin');

        // if (!$user) {
        //     return redirect()->route('login');
        // }

        return view('dashboard', compact('user'));
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }

   

   
}
