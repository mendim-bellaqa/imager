<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Routing\Controller;

class AllUsersController extends Controller
{
    function show()
    {
        $data = User::all();
        
        return view('all-users', ['users' => $data]);
    }
}
