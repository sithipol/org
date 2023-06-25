<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ManagementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function setting()
    {
        $auth = Auth::user();
        $user = User::list(['group_id' => $auth->group_id, 'id' => $auth->id])->get();

        return view('management.setting', compact('user'));
    }
    public function profile(Request $request)
    {
        if ($request->isMethod('post')) {
            Validator::make($request->all(), [
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);

            $update = User::find(Auth::user()->id)->update(['password' =>  Hash::make($request['password'])]);
            $user = User::find(Auth::user()->id);
            return redirect()->to('/')->with('success', "success");
        } else {
            $user = User::find(Auth::user()->id);
            return view('management.profile', compact('user'));
        }
    }
}
