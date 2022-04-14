<x-dashboard-layout header="الصلاحيات ">

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="card mt-5 ml-5 mr-5 mb-5">
        <div class="mt-3 ml-3">
            <h4 for="">الصلاحيات:</h4>

            <form action="{{ route('user.store_roles', $user->id) }}" method="post">
                @csrf
                <div class="row">


                    @foreach (config('abilities') as $key => $roles)
                        <div class="col-md-3">

                                    <h5 class="mt-3 text-primary">{{ __($key) }}</h5>
                                    
                                    @if (is_array($roles))
                                        @foreach ($roles as $key => $value)
                                            <label for="{{ $key }}">
                                                <input id="{{ $key }}" class="checkbox" type="checkbox"
                                                    name="roles[]"
                                                    @if ($user->roles) @if (in_array($key, $user->roles)) checked @endif
                                                    @endif value="{{ $key }}">
                                                {{ $value }}
                                            </label>

                                            <br>
                                        @endforeach
                                    @else
                                        <label for="">
                                            <input class="checkbox" type="checkbox" name="roles[]"
                                                @if ($user->roles) @if (in_array($key, $user->roles)) checked @endif
                                                @endif value="{{ $key }}">
                                            {{ $roles }}
                                        </label>

                                    @endif

                        </div>
                    @endforeach


                </div>
                <Button class="btn btn-success mt-5 mb-5 " type="submit">اضافة الصلاحيات </Button>
            </form>
        </div>
    </div>

</x-dashboard-layout>
