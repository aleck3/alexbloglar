<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Userdetails;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /*
      |--------------------------------------------------------------------------
      | User Controller
      |--------------------------------------------------------------------------
      |
      | This controller is responsible for adding additional info about users
      |
     */

    //Show info about User
    public function userdetails($id)
    {
        $userdetails = Userdetails::findOrFail($id);
        if (!$userdetails) {
            return back();
        }
        return view('user.userdetails', ['userdetails' => $userdetails]);
    }

    //Show form for adding info about User
    public function add_mydetails()
    {
        return view('user.add_mydetails');
    }

    //Storing user's info to the database
    public function store_mydetails(Request $request)
    {
        $this->validate($request, [
            'avatar' => 'mimes:jpeg,bmp,png',
            'avatar' => 'dimensions:width=80,height=80'
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
