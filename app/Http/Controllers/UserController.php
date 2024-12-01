<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{

    public function index()
    {
        // Address::create([
        //     'street' => 'chalimard',
        //     'postCode' => '1003',
        //     'building' => 'william zard'
        // ]);


        // $user = Address::all()->first();
        // dd($user->toArray());
        return view('welcome');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => "required|min:3",
            'email' => 'email|unique:users',
            'password' => 'required|min:8',
            'g-recaptcha-response' => [
                'required',
                function ($attribute, $value, $fail) {
                    $g_response = Http::asForm()->post("https://www.google.com/recaptcha/api/siteverify",[
                        'secret' => config('services.recaptcha.secret_key'),
                        'response' => $value,
                        'remoteip' => request()->ip()
                    ]);

                    if (!$g_response->json('success')) {
                        $fail('The ' . $attribute . ' is invalid.');
                        dd('fail!!');
                    }
                },
            ]
        ]);

        // User::create([
        //     "name" => $request->name,
        //     "email" => $request->email,
        //     "password" => Hash::make($request->password)
        // ]);

        dd("User Created Successfully!");

        return Redirect()->back();
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);
        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            dd('Invalid Credentials');
        }

        dd('logged in successfully!');
    }

    public function ajaxSubmit(Request $request)
    {

        $validated = $request->validate([
            'name' => "required|min:3",
            'email' => 'email|unique:users',
            'password' => 'required|min:8'
        ]);

        User::create($validated);

        return response()->json(
            [
                'message' => 'User Created Successfully!',
            ]
        );
    }

    public function getUserInfo()
    {
        $data = User::all()->toArray();
        // $data = User::first()->toArray();


        return response()->json(
            [
                'data' => $data
            ]
        );
    }
}
