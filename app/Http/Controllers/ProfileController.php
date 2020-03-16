<?php

namespace App\Http\Controllers;

use Auth;
use App\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;//to input password

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();
        return view('profile.index', compact('user'));
    }

    public function update(Request $request)
    {
     
        // $this->validate($request, [
        //     'password' => 'confirmed',
        // ]);
        // $user = User::where('id', Auth::user()->id)->first();
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->nohp = $request->nohp;
        // $user->alamat = $request->alamat;
        // if(!empty($request))
        // {
        //     $user->password = Hash::make($request->password);
        // }

        // $user->update();

        // return redirect('profile');
    }
}
