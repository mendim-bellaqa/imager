<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Photo;
use Illuminate\Support\Facades\Auth;

class AdminPorositeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::check()) {
            $data = User::all();
            $data = Photo::with('author')->groupBy('folder_name')->orderBy('id')->where('status', '!=', 'Draft')->get();
            
            return view('admin.porosite', ['orders'=>$data]);
        } else {
            return view('auth.login');
        }
    }
}
