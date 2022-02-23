<x-dashboard-layout header="المستخدمين">

    <div class="content">
        <div class="container">



            <div class="box box-primary">

                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="table-toolbar mb-3">
                    <a href="{{ route('admin.users.create') }}" class="btn  btn-info"> إضافة مستخدم <i
                            class="fas fa-plus"></i></a>
                </div>
                 <div class="box-body">

                    <table class="table table-bordered mt-3">
                        <thead>
                            <tr>
                                <th>num</th>

                                <th>اسم المستخدم</th>
                                <th>الجوال</th>
                                <th>البريد الالكتروني</th>
                                <th>تاريخ الاضافة</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>

                                    <th> {{ $user->name }}</th>

                                    <th>{{ $user->mobile }}</th>

                                    <th>{{ $user->email }}</th>

                                    <th>{{ $user->created_at }}</th>

                                    <th>
                                        <a href="{{ route('admin.users.edit', $user->id) }}"
                                            class="btn btn-sm btn-outline-primary"><i class="far fa-edit"></i></a>
                                        <form class="d-inline"
                                            action="{{ route('admin.users.destroy', $user->id) }}"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-sm btn-outline-danger"><i
                                                    class="far fa-trash-alt "></i></button>
                                        </form>
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
                {{ $users->links() }}
            </div>
        </div>
    </div>
    </div>
    </div>


</x-dashboard-layout>
