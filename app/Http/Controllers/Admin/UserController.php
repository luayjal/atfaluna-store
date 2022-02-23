<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function index()
    {
       // dd(Auth::user()->email);
       $this->authorize('viewAny',User::class);

        $users = User::where('id','<>',Auth::id())->get();
        return view('dashboard.users.users',['users'=>$users]);
    }
    public function create()
    {
        $this->authorize('create',User::class);
        return view('dashboard.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'type' => 'admin',
            'password' => Hash::make($request->password),
        ]);

        return redirect(RouteServiceProvider::HOME);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->authorize('update',$user);

        return view('dashboard.users.edit',['user'=>$user]);
    }

    public function update(Request $request,$id)
    {
        $user = User::findOrFail($id);
        $this->authorize('update',$user);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'mobile'=>['required'],
            'type'=>['required'],

            'email' => ['string', 'email', 'max:255'],
            'password' => ['confirmed', Password::defaults()],
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'mobile'=>$request->mobile,
            'type'=>$request->type,

            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.users.index')->with('success','تم تعديل بيانات الموظف بنجاح');

    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);

         $this->authorize('delete',$user);
         User::destroy($id);

         return redirect()->route('admin.users.index')->with('success','تم حذف  الموظف بنجاح');
        }
}
