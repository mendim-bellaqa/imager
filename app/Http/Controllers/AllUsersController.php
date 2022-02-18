<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Controllers\AllUsersController;

class AllUsersController extends Controller
{
    function show()
    {
        $data = User::all();
        return view('all-users', ['users'=>$data]);
    }

    // function index()
    // {
    //     if (Auth::check()) {
    //         return view('admin.porosite');
            
    //     }

    //     else {
    //         return view('auth.login');
    //     }
    // }
}
