<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Userdetails;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function userdetails($id)
    {
        $userdetails = Userdetails::findOrFail($id);
        if (!$userdetails) {
            return back();
        }
        return view('user.userdetails', ['userdetails' => $userdetails]);
    }

    public function add_mydetails()
    {
        return view('user.add_mydetails');
    }

    public function store_mydetails(Request $request)
    {
        $this->validate($request, [
            'avatar' => 'mimes:jpeg,bmp,png',
            'avatar' => 'dimensions:width=160,height=160'
        ]);

        $userdetails = Userdetails::findorfail(Auth::id());

        //$userdetails->id = Auth::id();
        $userdetails->avatar = $request->file('avatar')->store('public/image/avatar');
        $userdetails->firstname = $request->input('firstname');
        $userdetails->lastname = $request->input('lastname');
        $userdetails->date_of_birth = $request->input('date_of_birth');
        $userdetails->save();

        return redirect('post');
    }

}
