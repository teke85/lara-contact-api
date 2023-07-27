<?php

namespace App\Http\Controllers;




use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class ApiAuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            "name" => "required|min:3",
            "email" => "required|email|unique:users",
            "password" => "required"
        ]);

        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ]);


        return response()->json([
            "message" => "User register successful",
        ]);
    }

    public function login(Request $request)
    {
        $request->validate([

            'email' => "required",
            'password' => "required"
        ]);
        // return $request;
        if (!Auth::attempt($request->only('email', 'password'))) {

            return response()->json(
                [
                    'message' => "Username or password invalid"
                ],
                200
            );
        }

        return Auth::user()->createToken("iphone");
    }

    public function logout()
    {
        Auth::user()->currentAccessToken()->delete();
        return response()->json(
            [
                'message' => 'logout successful'

            ]
        );
    }


    public function logOutAll()
    {
        foreach (Auth::user()->tokens as $token) {
            $token->delete();
        }
        return response()->json(
            [
                'message' => 'logout successful'

            ]
        );
    }

    public function devices()
    {
        return Auth::user()->tokens;
    }

    public  function reset(Request $request)
    {
        $optCode = rand(111111, 999999);

        $getUsr = User::where('email', '=', $request->email)->firstOrFail();
        // $getUsr = User::where('email', '=', $request->email)->get();
        // dd($getUsr);
        $getUsr->otp = $optCode;
        // dd($getUsr);

        $getUsr->save();
        return response()->json([
            'the opt code is ' => $optCode
        ]);
    }

    public function newPw(Request $request)
    {
        $getUsr = User::where('email', '=', $request->email)->firstOrFail();
        if (!$getUsr->otp == $request->otp) {
            return response()->json([
                'message' => 'Invalid Json'
            ]);
        }
        $getUsr->password = $request->new_password;
        $getUsr->update();
        return response()->json([
            'message' => 'update pw complete '
        ]);
    }

    public function makeVerify(Request $request)
    {
        return $request;
    }
}
