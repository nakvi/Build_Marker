<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ForemanController extends Controller
{
    //
    public function index()
    {
        $foremans = user::where('role','foreman')->get();
        //  dd($customers);
        return view('frontend.foreman.foreman',compact('foremans'));
    }
    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required',
            'address' => 'required',
        ]);
        $foreman = User::create([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'email_verified_at' => now(),
            'password'=> Hash::make('password'),
            'role' => 'foreman',
            'address'=>$request->input('address'),
            'phone'=>$request->input('phone'),

        ]);
        Session::flash('message', 'Created successfully!');
        Session::flash('alert-class', 'alert-success');
        return redirect()->back();

    }
    public function edit(string $id)
    {
        $foreman = User::find($id);
        return response()->json([
            'foreman' => $foreman,
        ]);
    }
    public function update(Request $request, string $id)
    {
        $foreman = user::find($id);
        $foreman->name = $request->name;
        $foreman->email = $request->email;
        $foreman->address = $request->address;
        $foreman->phone = $request->phone;
        $foreman->update();
        Session::flash('message', 'Updated successfully!');
        Session::flash('alert-class', 'alert-success');
        return redirect()->back();
    }
    public function destroy(string $id)
    {
        $category = User::destroy($id);
        Session::flash('message', 'Deleted successfully!');
        Session::flash('alert-class', 'alert-success');
    }
}
