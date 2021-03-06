<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function register(Request $request, Admin $admin)
    {
        $this->validator($request->all())->validate();
        $admin = $this->create($request->all());
        return response()->json([
            'admin' => $admin,
            'message' => 'registration successful'
        ], 200);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:255', 'unique:admins'],
            'town' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:4'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration
     * 
     * @param array $data
     * @return \App\Models\Admin
     */

    protected function create(array $data)
    {
        return Admin::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'phone_number' => $data['phone_number'],
            'town' => $data['town'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('phone_number', 'password');
        if (Auth::guard('admin')->attempt($credentials)) {
            return response()->json(['message' => 'Login successful'], 200);
        } else {
            return response()->json(['message' => 'Invalid phone number or password'], 401);
        }
    }

    public function logout()
    {
        Auth::logout();
        return response()->json(['message' => 'Logged Out'], 200);
    }
}
