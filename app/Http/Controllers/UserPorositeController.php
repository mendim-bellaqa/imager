<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPorositeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewOrders()
    {
        if (!Auth::check()) {
            return view('auth.login');
        }

        $userId = Auth::user()->id;
        $data = Photo::with('author')->where('user_id', $userId)->groupBy('folder_name')->where('status', '!=', 'Draft')->orderBy('id')->get();

        return view('user-porosite', ['userOrders' => $data]);
    }
}
