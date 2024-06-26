<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    //
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            $errorMessage = $validator->errors()->first();
            $response = [
                'status'  => false,
                'message' => $errorMessage,
            ];
            return response()->json($response, 401);
        }
        $credentials = $request->only('email', 'password');
        if (auth()->attempt($credentials)) {
            return response()->json([
               'status' => true,
                'data' => auth()->user()
            ], 200);
        } else {
            return response()->json([
               'status' => false,
               'message' => 'Invalid Credentials'
            ], 401);
        }
    }
    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'new_password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            $errorMessage = $validator->errors()->first();
            $response = [
                'status'  => false,
                'message' => $errorMessage,
            ];
            return response()->json($response, 401);
        }

        $user = User::where('email',$request->email)->first();
        if ($user) {
            $user->password = Hash::make($request->new_password);
            $user->save();
            $data = [
                'status' => true,
                'message' => 'Password successfully Updated',
                'data' => (object) [],
            ];
            return response()->json($data, 200);

        } else {
            $data = [
                'status' => false,
                'message' => 'User Not Found',
                'data' => (object) [],
            ];
        }
        return response()->json($data, 404);
    }
}
