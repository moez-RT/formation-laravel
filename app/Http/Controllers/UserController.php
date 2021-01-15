<?php

namespace App\Http\Controllers;
use JWTAuth;
use App\Http\Requests\RegistrationFormRequest;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public $loginAfterSignUp = true;

    /**
     * @param RegistrationFormRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(RegistrationFormRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
   
        return response()->json([
            'success'   =>  true,
            'data'      =>  $user
        ], 200);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $input = $request->only('email', 'password');
        $token = null;
     
        if (!$token = JWTAuth::attempt($input)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Email or Password',
            ], 401);
        }

      return response()->json([
            'success' => true,
            'token' => $token,
        ]); 
    }
}
