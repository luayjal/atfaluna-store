<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\DeliveryAgents;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class DeliveryAgentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = DB::table('delivery_agents')
            ->join('users', 'users.id', '=', 'delivery_agents.user_id')
            ->select('delivery_agents.*','name','email','mobile','image','type')
            ->paginate();

        return view('dashboard.deliveryAgents.index', [
            'users' => $users,
        ]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.deliveryAgents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:100', 'unique:users'],
            'image' => 'image',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ], [
            'name.required' => 'مطلوب!، الرجاء إدخال الاسم',
            'name.unique' => ' هذا الاسم موجود بالفعل ، رجاءا أدخل اسم آخر',
            'name.min' => ' يجب ألا يقل الاسم عن ثلاثة احرف',
            'name.max' => ' يجب ألا يزيد الاسم عن مائة حرف',
            'mobile.required' => 'مطلوب!، الرجاء إدخال رقم الهاتف',
            'email.required' => 'مطلوب!، الرجاء إدخال الايميل',
            'email.email' => 'الرجاء إدخال الايميل بشكل صحيح',
            'email.unique' => ' هذا البريد موجود بالفعل ، رجاءا أدخل بريد آخر',
            'email.min' => ' يجب ألا يقل الاسم عن ثلاثة احرف',
            'email.max' => ' يجب ألا يزيد الاسم عن مائة حرف',
        ]);

        $request->merge([
            'slug' => Str::slug_ar($request->name),
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image = $file->store('/images', ['disk' => 'uploads']);
        }else{
            $image =null;
        }

        if ($request->hasFile('user_id_image')) {
            $file = $request->file('user_id_image');
            $user_id_image = $file->store('/images', ['disk' => 'uploads']);
        }else{
            $user_id_image =null;
        }
        if ($request->hasFile('car_form_image')) {
            $file = $request->file('car_form_image');
            $car_form_image = $file->store('/images', ['disk' => 'uploads']);
        }else{
            $user_id_image =null;
        }

        $user = User::create([
            'name' => $request->name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image' => $image,
            'type' => 'delivery',

        ]);

        DeliveryAgents::create([
            'user_id'  => $user['id'],
            'user_id_image'  => $user_id_image,
            'car_form_image'  => $car_form_image ,
            'address'  => $request->address,
            'car_body'  => $request->car_body,
            'car_model'  => $request->car_model,
            'driving_license'=> $request->driving_license,
        ]);




        return redirect()->route('admin.delivery.index')->with('success', 'تم اضافة بيانات مندوب التوصيل بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $user = DB::table('delivery_agents')
            ->join('users', 'users.id', '=', 'delivery_agents.user_id')
            ->select('delivery_agents.*','name','email','mobile','image','type')
            ->where('delivery_agents.id',$id)
            ->first();

        return view('dashboard.deliveryAgents.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = DB::table('delivery_agents')
            ->join('users', 'users.id', '=', 'delivery_agents.user_id')
            ->select('delivery_agents.*','name','email','mobile','image','type')
            ->where('delivery_agents.id',$id)
            ->first();
        $user_id=$user->user_id;

        if (empty($request->password) || is_null($request->password)){
            $validate = [
                'name' => ['required', 'string', 'min:3', 'max:100'],
                'email' => ['required', 'string', 'email', 'max:255',
                    \Illuminate\Validation\Rule::unique('users')->ignore($user_id)],

            ];
        }else{
            $validate = [
                'name' => ['required', 'string', 'min:3', 'max:100'],
                'email' => ['required', 'string', 'email', 'max:255',
                    \Illuminate\Validation\Rule::unique('users')->ignore($user_id)],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ];
        }
        $request->validate($validate, [
            'name.required' => 'مطلوب!، الرجاء إدخال الاسم',
            'name.unique' => ' هذا الاسم موجود بالفعل ، رجاءا أدخل اسم آخر',
            'name.min' => ' يجب ألا يقل الاسم عن ثلاثة احرف',
            'name.max' => ' يجب ألا يزيد الاسم عن مائة حرف',
            'mobile.required' => 'مطلوب!، الرجاء إدخال رقم الهاتف',
            'email.required' => 'مطلوب!، الرجاء إدخال الايميل',
            'email.email' => 'الرجاء إدخال الايميل بشكل صحيح',
            'email.unique' => ' هذا البريد موجود بالفعل ، رجاءا أدخل بريد آخر',
            'email.min' => ' يجب ألا يقل الاسم عن ثلاثة احرف',
            'email.max' => ' يجب ألا يزيد الاسم عن مائة حرف',
        ]);

        $request->merge([
            'slug' => Str::slug_ar($request->name),
        ]);
        $data_user=[
            'name' => $request->name,
            'mobile' => $request->mobile,
            'email' => $request->email,
        ];
        $data_delivery=[
            'address'  => $request->address,
            'car_body'  => $request->car_body,
            'car_model'  => $request->car_model,
            'driving_license'=> $request->driving_license,
        ];
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $data_user['image'] = $file->store('/images', ['disk' => 'uploads']);
        }

        if ($request->hasFile('user_id_image')) {
            $file = $request->file('user_id_image');
            $data_delivery['user_id_image'] = $file->store('/images', ['disk' => 'uploads']);
        }
        if ($request->hasFile('car_form_image')) {
            $file = $request->file('car_form_image');
            $data_delivery['car_form_image'] = $file->store('/images', ['disk' => 'uploads']);
        }

        if (empty($request->password) || is_null($request->password)){
            $data_user['password'] = Hash::make($request->password) ;
        }

        $User = User::findOrFail($user_id);
        $User->update($data_user);
        $DeliveryAgents=DeliveryAgents::findOrFail($id);
        $DeliveryAgents->update($data_delivery);
        return redirect()->route('admin.delivery.index')->with('success', 'تم تعديل بيانات مندوب التوصيل بنجاح');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $deliveryAgents = DeliveryAgents::findOrFail($id);
        $user_id=$deliveryAgents->user_id;

        $user=User::findOrFail($user_id);

        if ($user->image) {

            Storage::disk('uploads')->delete($user->image);
        }

        if ($deliveryAgents->user_id_image) {

            Storage::disk('uploads')->delete($deliveryAgents->user_id_image);
        }
        if ($deliveryAgents->car_form_image) {

            Storage::disk('uploads')->delete($deliveryAgents->car_form_image);
        }
        $deliveryAgents->delete();
        $user->delete();

        return redirect()->route('admin.delivery.index')->with('success', 'تم حذف بيانات مندوب التوصيل النجاح');

    }
}
