<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth:api', ['except' => 'login', 'signup']);
    // }
    public function signup(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed',
        ]);
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $user->save();
        return response()->json([
            'message' => 'Successfully created user!',
        ], 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean',
        ]);

        $credentials = request(['email', 'password']);

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => __('Please verify fields'),
            ], 401);
        }

        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;

        if (!$request->remember_me) {
            $token->expires_at = Carbon::now()->addWeeks(1);
        }

        $token->save();
        $user->save();

        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString(),
            'user_id' => $user->id,
            'user_role' => $user->user_role,
        ]);

    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out',
        ]);
    }

    public function user(Request $request)
    {
        return response()->json($request->user());
    }
    public function dec()
    {
        auth()->logout();
        return redirect('/');
    }
    public function userprofile(Request $request)
    {
        $user = auth()->user();
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email',
            'cin' => 'required',
            'phonenumber' => 'required',
            'address' => 'required|string',
        ]);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phonenumber = $request->phonenumber;
        $user->cin = $request->cin;
        $user->address = $request->address;
        $user->update();

        return response()->json([
            'message' => 'Successfully updated user data',
        ], 201);

    }
}
