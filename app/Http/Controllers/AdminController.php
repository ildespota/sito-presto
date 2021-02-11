<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth.admin');
    }

    public function getPermissions(){
        return view('permissions');
    }

    public function makeRevisor($user_id){
        /* dd($user_id); */
        $user = User::find($user_id);
        $user->is_revisor = 1;
        $user->save();
        return redirect()->back();
    }

    public function makeAdmin($user_id){
        $user = User::find($user_id);
        $user->is_admin = 1;
        $user->save();
        return redirect()->back();
    }

    public function cancelRevisor($user_id){
        /* dd($user_id); */
        $user = User::find($user_id);
        $user->is_revisor = 0;
        $user->save();
        return redirect()->back();
    }

    public function cancelAdmin($user_id){
        $user = User::find($user_id);
        $user->is_admin = 0;
        $user->save();
        return redirect()->back();
    }
}
