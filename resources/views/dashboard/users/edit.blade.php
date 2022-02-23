<x-dashboard-layout header="اضافة مستخدم">


        <!-- Validation Errors -->
        @if ($errors->any())
    <div class="alert alert-danger">
            <div class="font-medium text-red-600">
                {{ __('Whoops! Something went wrong.') }}
            </div>

            <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                @foreach ($errors->all() as $error)
                    <li class="">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

        <form method="POST" action="{{ route('admin.users.update',$user->id) }}" class="col-6 m-4 p-3">
            @csrf
            @method('put')
            <!-- Name -->
            <div>
                <x-label for="name" :value="__('الاسم')" />

                <x-input id="name" class="block mt-1 w-full form-control" type="text" name="name" :value="old('name',$user->name)" required autofocus />
            </div>

            <div class="mt-4">
                <x-label for="type" :value="__('type')" />

               <select class="block mt-1 w-full form-control" name="type" id="">
                   <option value="">type</option>
                   <option value="user">user</option>
                   <option value="admin">admin</option>

               </select>
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('الايميل')" />

                <x-input id="email" class="block mt-1 w-full form-control" type="email" name="email" :value="old('email',$user->email)" required />
            </div>

            <!-- Mobile -->
            <div class="mt-4">
                <x-label for="mobile" :value="__('رقم الهاتف')" />

                <x-input id="mobile" class="block mt-1 w-full form-control" type="text" name="mobile" :value="old('mobile',$user->mobile)" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('كلمة المرور')" />

                <x-input id="password" class="block mt-1 w-full form-control"
                                type="password"
                                name="password"
                                 autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('تأكيد كلمة المرور')" />

                <x-input id="password_confirmation" class="block mt-1 w-full form-control"
                                type="password"
                                name="password_confirmation"  />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4 btn btn-primary ">
                    {{ __('تعديل') }}
                </x-button>
            </div>
        </form>
</x-dashboard-layout>
