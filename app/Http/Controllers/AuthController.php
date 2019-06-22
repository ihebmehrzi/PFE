<?php
namespace App\Http\Controllers;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */


    public function register(Request $request)
    {



        $this->validate($request,[
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string',
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

//        $this->validate($request, [
//            'name' => 'required',
//            'email' => 'required|email',
//            'password' => 'required|min:6'
//        ]);
//        $user = new User();
//        $user->name = $request->name;
//        $user->email = $request->email;
//        $user->password = bcrypt($request->password);
//        $user->save();
//        return response()->json(['user' => $user]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
//        $credentials = request(['email', 'password']);
//        if (! $token = auth('api')->attempt($credentials)) {
//            return response()->json(['error' => 'Unauthorized'], 401);
//        }
//        return $this->respondWithToken($token);

        $this->validate($request,[
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean',
        ]);

        $credentials = request(['email', 'password']);

        if (!auth()->attempt($credentials)) {
            return response()->json([
                'message' => __('Please verify fields'),
            ], 401);
        }

        $user = $request->user();
        //$tokenResult = $user->createToken('Personal Access Token');
        //$token = $tokenResult->token;

        if (!$request->remember_me) {
           // $token->expires_at = Carbon::now()->addWeeks(1);
        }

      //  $token->save();
        $user->save();

        return response()->json([
          //  'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            //'expires_at' => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString(),
            'user'=>$user
        ]);





    }
    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth('api')->user());
    }
    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth('api')->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }
    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth('api')->refresh());
    }
    /**
     * Get the token array structure.
     *
     * @param string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'user' => $this->guard()->user(),
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
            'user_id'=>$this->guard()->user()->id,
            'registered'=>true
        ]);
    }
    public function guard(){
        return \Auth::Guard('api');
    }
}

//<?php
//namespace App\Http\Controllers;
//use App\User;
//use Carbon\Carbon;
//use Illuminate\Http\Request;
//
//class AuthController extends Controller
//{
//    // public function __construct()
//    // {
//    //     $this->middleware('auth:api', ['except' => 'login', 'signup']);
//    // }
//
//
//    /**
//
//     * @param Request $request
//     * @return \Illuminate\Http\JsonResponse
//     * @return \Illuminate\Http\Response
//     * @throws \Illuminate\Validation\ValidationException
//     */
//    public function signup(Request $request)
//    {
//        $request->validate([
//            'name' => 'required|string',
//            'email' => 'required|string|email|unique:users',
//            'password' => 'required|string|confirmed',
//        ]);
//        $user = new User([
//            'name' => $request->name,
//            'email' => $request->email,
//            'password' => bcrypt($request->password),
//        ]);
//        $user->save();
//        return response()->json([
//            'message' => 'Successfully created user!',
//        ], 201);
//    }
//
//    /**
//     * Login user and create token
//     *
//     * @param  [string] email
//     * @param  [string] password
//     * @param  [boolean] remember_me
//     * @return [string] access_token
//     * @return [string] token_type
//     * @return [string] expires_at
//     */
//    public function login(Request $request)
//    {
//        $request->validate([
//            'email' => 'required|string|email',
//            'password' => 'required|string',
//            'remember_me' => 'boolean',
//        ]);
//
//        $credentials = request(['email', 'password']);
//
//        if (!auth()->attempt($credentials)) {
//            return response()->json([
//                'message' => __('Please verify fields'),
//            ], 401);
//        }
//
//        $user = $request->user();
//        $tokenResult = $user->createToken('Personal Access Token');
//        $token = $tokenResult->token;
//
//        if (!$request->remember_me) {
//            $token->expires_at = Carbon::now()->addWeeks(1);
//        }
//
//        $token->save();
//        $user->save();
//
//        return response()->json([
//            'access_token' => $tokenResult->accessToken,
//            'token_type' => 'Bearer',
//            'expires_at' => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString(),
//            'user_id'=>$user->id
//        ]);
//
//    }
//
//    /**
//     * Logout user (Revoke the token)
//     *
//     * @return [string] message
//     */
//    public function logout(Request $request)
//    {
//        $request->user()->token()->revoke();
//        return response()->json([
//            'message' => 'Successfully logged out',
//        ]);
//    }
//
//    /**
//     * Get the authenticated User
//     *
//     * @return [json] user object
//     */
//    public function user(Request $request)
//    {
//        return response()->json($request->user());
//    }
//}


