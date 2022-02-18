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

    function vieworder()
    {


        $userId = Auth::user()->id;

        if (Auth::check()) {
            $data = Photo::with('author')->where('user_id', $userId)->groupBy('folder_name')->orderBy('id')->get();
            return view('user-porosite', ['userorders'=>$data, 'userorders'=>$data]);
            // return view('user-porosite')->json(['success'=>'Porosia juaj eshte ne proces',['userorders'=>$data]]);
        } else {
            return view('auth.login');
        }
    }

    // public function changeStatus(Request $request)
    // {
    //     $user = User::find($request->user_id);
    //     $user->status = $request->status;
    //     $user->save();

    //     return response('user-porosite')->json(['success'=>'Porosia juaj eshte ne proces',['userorders'=>$data]]);
    // }

}
