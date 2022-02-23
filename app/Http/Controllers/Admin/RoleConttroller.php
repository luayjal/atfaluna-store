<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleConttroller extends Controller
{
    public function index($user_id)
    {
        $user = User::findOrFail($user_id);
        $this->authorize('role', $user);

      //  $this->authorize('role',$user);

        return view('dashboard.roles',['user'=>$user]);
    }


    public function store(Request $request,$user_id)
    {
        $user = User::findOrFail($user_id);

        $this->authorize('role', $user);

       // dd($request);
     //   $this->authorize('role',$user);

        $user->roles = $request->roles;
        $user->save();
        return redirect()->route('admin.users.index')->with('success','تم اضافة الصلاحيات بنجاح!');
    }
}

