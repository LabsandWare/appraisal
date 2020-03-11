<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function authenticate(Request $request)
    { 

      $this->validate($request, [
        'username' => 'required',
        'password' => 'required'
      ]);

      $user = User::where('username', $request->username)->first();

      if (Hash::check($request->password, $user->password)) {
        # code...
        $token = $user->createToken('api_key')->accessToken;

        return response()->json([
          'status' => 'Success',
          'apikey' => $token
        ]);
      } else {
        return response()->json([
          'status' => 'fail'
        ], 401);
      }

    }

}
