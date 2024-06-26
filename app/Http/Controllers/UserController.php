<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth,Hash};
use App\Models\User;

class UserController extends Controller
{
    //
    public function index(Request $request)
    {
        if(Request()->isMethod('POST')){
            $user = User::find(Auth::user()->id);
            $hashedPassword = Hash::make($request->password);
                $user->password = $hashedPassword;
                $user->save();
                return back()->with(['success' => 'User password updated successfully']);
        }
        return view('password.password');
    }
}
