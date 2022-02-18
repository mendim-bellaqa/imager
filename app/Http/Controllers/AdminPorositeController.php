<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\User;
use App\Models\Photo;
use ZipArchive;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminPorositeController;

class AdminPorositeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    function index()
    {
        $role=Auth::user()->role;
        if (Auth::check()) {
        $data = User::all();
        $data = Photo::with('author')->groupBy('folder_name')->orderBy('id')->get();
        return view('admin.porosite', ['orders'=>$data]);

        }
        else {
            return view('auth.login');
        }
    }
}
