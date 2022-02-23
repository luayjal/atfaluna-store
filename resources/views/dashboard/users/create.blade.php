<x-dashboard-layout header="اضافة مستخدم">


        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('admin.users.store') }}" class="col-6 m-4 p-3">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('الاسم')" />

                <x-input id="name" class="block mt-1 w-full form-control" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- image -->

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('الايميل')" />

                <x-input id="email" class="block mt-1 w-full form-control" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Mobile -->
            <div class="mt-4">
                <x-label for="mobile" :value="__('رقم الهاتف')" />

                <x-input id="mobile" class="block mt-1 w-full form-control" type="text" name="mobile" :value="old('mobile')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('كلمة المرور')" />

                <x-input id="password" class="block mt-1 w-full form-control"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('تأكيد كلمة المرور')" />

                <x-input id="password_confirmation" class="block mt-1 w-full form-control"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4 btn btn-primary ">
                    {{ __('اضافة') }}
                </x-button>
            </div>
        </form>
</x-dashboard-layout>
