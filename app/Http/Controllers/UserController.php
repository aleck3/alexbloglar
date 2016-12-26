<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User_details;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function author_details($id)
    {
        $user_details = User_details::findOrFail($id)->get();
        if (!$user_details) {
            $user_details = 'There is no information about the author';
        }
        return view('user.index', ['user_details' => $user_details]);
    }
    
    public function my_details()
    {
        $user_details = User_details::findOrFail(Auth::id())->get();
        return view('user.index', ['user_details' => $user_details]);
    }
}
